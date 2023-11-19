import json
import requests
import pandas as pd

from lifx import Lifx 
token = Lifx.default_token['token']

headers = {
    "Authorization": "Bearer %s" % token,
}

response = requests.get('https://api.lifx.com/v1/lights/all', headers=headers)

lights = response.json()
print(lights)

lights_df = pd.DataFrame.from_dict(lights)
# Choosing a particular light using Pandas
label_of_interest = 'BedRoom Lamp' # name device
label_id = lights_df[lights_df.label == label_of_interest]['id'].iloc[0]

# lights
label_id

# power on
payload = {
  "states": [
    {
        "selector" : f"id:{label_id}",
        "power": "on"
    }
  ]
}

response = requests.put('https://api.lifx.com/v1/lights/states', data=json.dumps(payload), headers=headers)
response.json()

# power on with color
payload = {
  "states": [
    {
        "selector" : f"id:{label_id}",
            "period": 2,
            "cycles": 5,
            "color": "blue",
            "brightness": 0.5
    }
  ],
  "defaults": {
    "power": "on",
    "saturation": 0,
    "duration": 2.0

  }
}

response = requests.put('https://api.lifx.com/v1/lights/states', data=json.dumps(payload), headers=headers)
response.json()

# power off
payload = {
  "states": [
    {
        "selector" : f"id:{label_id}",
        "power": "off"
    }
  ]
}

response = requests.put('https://api.lifx.com/v1/lights/states', data=json.dumps(payload), headers=headers)
response.json()