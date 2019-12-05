import pandas as pd
import numpy as np 
import matplotlib.pyplot as plt
import matplotlib
import seaborn as sns
import random
import string
import copy  
from sklearn.metrics.pairwise import linear_kernel
from sklearn.metrics.pairwise import cosine_similarity
from flask import Flask, request, jsonify
import csv


def csv_update(resp_obj):
    with open('/src/data/responses.csv', mode='a') as csv_file:
        fieldnames = ['name', 'lastName', 'Date', 'age']
        writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
        temp = {
            "name": resp_obj['name'],
            "lastName": resp_obj['lastName'],
            "Date": "asd",
            "age": 29
        }
        writer.writerow(temp)


data_location = '/src/data/responses.csv'
data = pd.read_csv(data_location)

app = Flask(__name__)

def encoding(data):
    df = copy.deepcopy(data)
    for i in df.select_dtypes(include=['object']).columns:
        list_unique = set(df[i].unique())
        dict_pro = dict(zip(list_unique,np.arange(len(list_unique))))
        df[i] = df[i].map(dict_pro)
    return df

data.select_dtypes(include=['object']).columns
data = encoding(data)

for i in range(data.shape[0]):
    data['title']=i
for i in range(data.shape[0]):
    data['title'][i]=str(i)+random.choice(string.ascii_letters)    

indices = pd.Series(data.index, index=data['title']).drop_duplicates()

indices = pd.Series(data.index, index=data['title']).drop_duplicates()
data = data.dropna()
data = data.dropna()
feature_vactor=data[['Music','Dance','Musical','Pop']]
f=data[['title','Music','Dance','Musical','Pop']]


cosine_sim = linear_kernel(feature_vactor, feature_vactor)
cosine_sim2 = cosine_similarity(feature_vactor, feature_vactor)

def get_recommendations(title, cosine_sim):
    idx = indices[title]
    sim_scores = list(enumerate(cosine_sim[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    sim_scores = sim_scores[1:11]
    movie_indices = [i[0] for i in sim_scores]
    return data['title'].iloc[movie_indices]

data = data.reset_index()
indices = pd.Series(data.index, index=data['title'])

@app.route('/', methods=['GET','POST'])
def index():
    if request.method == 'POST':
        resp = request.json
        csv_update(resp)
        res = get_recommendations(resp['name'], cosine_sim2)
        print(res)
        res = res.values.tolist()
        response = jsonify({
            "result": res
        })
        return response
    else:
        return "get method!!!"


if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)