from flask import Flask, request, jsonify
from light_lifx import control_light  # Import function from light_lifx.py

app = Flask(__name__)

@app.route('/toggle-light', methods=['POST'])
def toggle_light():
    light_state = request.json.get('lightState')
    success = control_light(light_state)  # Using function from light_lifx.py to control light
    return jsonify({'success': success})

if __name__ == '__main__':
    app.run(debug=True)
