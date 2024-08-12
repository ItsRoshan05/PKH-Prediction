from flask import Flask, request, jsonify
from sklearn.preprocessing import LabelEncoder
import pandas as pd
import joblib

app = Flask(__name__)

# Load the pre-trained models and label encoders
model_nb = joblib.load('model/model_nb.joblib')
model_c45 = joblib.load('model/model_c45.joblib')
label_encoders = joblib.load('model/label_encoders.joblib')

expected_features = ['JUMLAH_KELUARGA', 'PENGHASILAN', 'PENDIDIKAN_TERTINGGI', 'SETATUS_RUMAH', 'PEKERJAAN', 'KONDISI_KESEHATAN']

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    data.pop('_token', None)
    
    df = pd.DataFrame([data])
    
    for feature in expected_features:
        if feature not in df.columns:
            return jsonify({'error': f'Missing feature: {feature}'})
    
    for column in df.columns:
        if column in label_encoders:
            le = label_encoders[column]
            df[column] = le.transform(df[column])

    prediction_nb = model_nb.predict(df[expected_features])
    prediction_c45 = model_c45.predict(df[expected_features])
    
    score_nb = model_nb.predict_proba(df[expected_features])
    score_c45 = model_c45.predict_proba(df[expected_features])


    predicted_status_nb = label_encoders['SETATUS_PENERIMA'].inverse_transform(prediction_nb)
    predicted_status_c45 = label_encoders['SETATUS_PENERIMA'].inverse_transform(prediction_c45)
    
    response = {
        'prediction_nb': predicted_status_nb[0],
        'prediction_c45': predicted_status_c45[0],
        'score_nb': score_nb[0].max(),  # Assuming you want the max probability score
        'score_c45': score_c45[0].max()  # Assuming you want the max probability score
    }
    
    return jsonify(response)

@app.route('/alldata', methods=['GET'])
def get_data():
    # Load CSV data
    df = pd.read_csv('data/dataJamal.csv')
    
    # Convert DataFrame to JSON
    data_json = df.to_dict(orient='records')
    
    return jsonify(data_json)

if __name__ == '__main__':
    app.run(debug=True)
