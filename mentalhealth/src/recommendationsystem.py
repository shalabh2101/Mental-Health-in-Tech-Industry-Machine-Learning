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
    with open('data/responses.csv', mode='a') as csv_file:
        fieldnames = ['name', 'lastName', 'Date', 'age']
        writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
        temp = {
            "name": resp_obj['name'],
            "lastName": resp_obj['lastName'],
            "Date": "asd",
            "age": 29
        }
        writer.writerow(temp)

data_location = 'data/responses.csv'
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

print(type(data))


title = [x+1 for x in range(data.shape[0])]

data['title'] = title

indices = pd.Series(data.index, index=data['title'])

data = data.dropna()







maindata=data[['Folk','Classical music','Pop','Metal or Hardrock','Opera','Documentary','Horror','Thriller','Romantic','Sci-fi',
           'History','Science and technology','Writing','Dancing','Foreign languages','Religion','Countryside, outdoors','Pets','Cars',
         'Prioritising workload','Writing notes','Fear of public speaking', 'Funniness','Getting angry','Charity','Assertiveness','Loneliness','Appearence and gestures' ]]

moviesmusic=data[['Folk','Classical music','Pop','Metal or Hardrock','Opera','Documentary','Horror','Thriller','Romantic',
                     'Sci-fi']]
    
hobbiesinterest=data[['History','Politics','Science and technology','Writing','Dancing','Foreign languages','Religion',
                        'Countryside, outdoors','Pets','Cars']]
    
traits=data[['Prioritising workload','Writing notes','Fear of public speaking','Funniness','Mood swings','Getting angry','Charity','Assertiveness','Loneliness',
               'Appearence and gestures' ]]


feature_vactor=maindata
f=data[['title','Music','Dance','Musical','Pop']]


cosine_sim = linear_kernel(feature_vactor, feature_vactor)
cosine_sim2 = cosine_similarity(feature_vactor, feature_vactor)

def get_recommendations(title, cosine_sim):
    idx = indices.iloc[title]
    sim_scores = list(enumerate(cosine_sim[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    sim_scores = sim_scores[1:11]
    movie_indices = [i[0] for i in sim_scores]
    return data['title'].iloc[movie_indices]


import json
@app.route('/', methods=['GET','POST'])
def index():
    if request.method == 'POST':
        try:
            resp = request.json
            res_list = []
            res = get_recommendations(resp['name'], cosine_sim2)
            res = res.to_list()[:3]

            for i in res:
                temp_dict = {}
                temp_dict['id'] = i
                
                moviesmusic_row = moviesmusic.iloc[i].to_dict()
                temp1 = sorted(moviesmusic_row, key=moviesmusic_row.get)[-3:]
                temp_dict['moviesmusic'] = temp1

                hobbiesinterest_row = hobbiesinterest.iloc[i].to_dict()
                temp2 = sorted(hobbiesinterest_row, key=hobbiesinterest_row.get)[-3:]
                temp_dict['hobbiesinterest'] = temp2

                traits_row = traits.iloc[i].to_dict()
                temp3 = sorted(traits_row, key=traits_row.get)[-3:]
                temp_dict['traits'] = temp3

                

                
                res_list.append(temp_dict)
            
            temp6 = {}  

            user_row = moviesmusic.iloc[resp['name']].to_dict()
            temp3 = sorted(user_row, key=user_row.get)[-3:]
            temp6['moviesmusic'] = temp3

            hobbies_row = hobbiesinterest.iloc[resp['name']].to_dict()
            temp4 = sorted(hobbies_row, key=hobbies_row.get)[-3:]
            temp6['hobbiesinterest'] = temp4

            t_row = traits.iloc[resp['name']].to_dict()
            temp5 = sorted(t_row, key=t_row.get)[-3:]
            temp6['traits'] = temp5
            
            res_list.append(temp6)

            return jsonify({
                "result": res_list
            })

        except:
            return jsonify({
                "result": "Data Frame is Null. Try with another value."
            })
    else:
        return "get method!!!"


#mental health prediction
import numpy as np
import pandas as pd

import matplotlib.pyplot as plt
import seaborn as sns

from scipy import stats
from scipy.stats import randint

# prep
from sklearn.model_selection import train_test_split
from sklearn import preprocessing
from sklearn.datasets import make_classification
from sklearn.preprocessing import binarize, LabelEncoder, MinMaxScaler

# models
from sklearn.linear_model import LogisticRegression
from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import RandomForestClassifier, ExtraTreesClassifier


#age_df = pd.read_csv('./Data/mental-heath-in-tech-2016_20161114.csv')
train_df = pd.read_csv('./data/processed.csv')
# define X and y

#old
# feature_cols = ['What is your age?', 'What is your gender?', 'Do you have a family history of mental illness?',
#                 'Does your employer provide mental health benefits as part of healthcare coverage?',
#                 'Do you know the options for mental health care available under your employer-provided coverage?',
#                 'Is your anonymity protected if you choose to take advantage of mental health or substance abuse treatment resources provided by your employer?',
#                 'If a mental health issue prompted you to request a medical leave from work, asking for that leave would be:',
#                 'Do you believe your productivity is ever affected by a mental health issue?']


feature_cols = [ 'What is your age?','What is your gender?',
                 'Do you have a family history of mental illness?',
                 'Have you had a mental health disorder in the past?',
                 'Do you believe your productivity is ever affected by a mental health issue?',
                 'If yes, what percentage of your work time (time performing primary or secondary job functions) is affected by a mental health issue?',
                 'If you have a mental health issue, do you feel that it interferes with your work when being treated effectively?',
                 'If you have a mental health issue, do you feel that it interferes with your work when NOT being treated effectively?'
                ]

X1 = train_df[feature_cols]
y1= train_df['Have you ever sought treatment for a mental health issue from a mental health professional?']

feature_cols_2 =[ 'What is your age?',
                 'What is your gender?',
                 'Is your anonymity protected if you choose to take advantage of mental health or substance abuse treatment resources provided by your employer?',
                 'If a mental health issue prompted you to request a medical leave from work, asking for that leave would be:',
                 'Would you feel comfortable discussing a mental health disorder with your coworkers?',
                 'Would you feel comfortable discussing a mental health disorder with your direct supervisor(s)?',
                 'Have you heard of or observed negative consequences for co-workers who have been open about mental health issues in your workplace?',
                 'Do you think that team members/co-workers would view you more negatively if they knew you suffered from a mental health issue?',
                 'Have you observed or experienced an unsupportive or badly handled response to a mental health issue in your current or previous workplace?',
                 'Have your observations of how another individual who discussed a mental health disorder made you less likely to reveal a mental health issue yourself in your current workplace?',

              ]
X2 = train_df[feature_cols_2]
y2 = train_df['Do you think that discussing a mental health disorder with your employer would have negative consequences?']

# split X and y into training and testing sets
#X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.30, random_state=0)


def treeClassifier(c,X,Y):
    # Calculating the best parameters
    X_train, X_test, y_train, y_test = train_test_split(X, Y, test_size=0.30, random_state=0)



    tree = DecisionTreeClassifier()
    featuresSize = 8
    param_dist = {"max_depth": [3, None],
              "max_features": randint(1, featuresSize),
              "min_samples_split": randint(2, 9),
              "min_samples_leaf": randint(1, 9),
              "criterion": ["gini", "entropy"]}

    forest = RandomForestClassifier(n_estimators = 20)

    #featuresSize = feature_cols.__len__()
    param_dist = {"max_depth": [3, None],
              "max_features": randint(1, featuresSize),
              "min_samples_split": randint(2, 9),
              "min_samples_leaf": randint(1, 9),
              "criterion": ["gini", "entropy"]}
    #tuningRandomizedSearchCV(forest, param_dist)          
    #tuningRandomizedSearchCV(tree, param_dist)

    forest = RandomForestClassifier(max_depth = None, min_samples_leaf=8, min_samples_split=2, n_estimators = 20, random_state = 1)
    my_forest = forest.fit(X_train, y_train)
    
    # make class predictions for the testing set
    

    # train a decision tree model on the training set
    tree = DecisionTreeClassifier(max_depth=3, min_samples_split=8, max_features=6, criterion='entropy', min_samples_leaf=7)
    tree.fit(X_train, y_train)

    # make class predictions for the testing set
   # y_pred_class = tree.predict(X_test)


    c1=np.array(c).reshape(-1, 8)

    #y_pred_class = tree.predict(c)
    y_pred_class = my_forest.predict(c1)
    #print('y_pred_class')
    return (y_pred_class)


def treeClassifier2(c,X,Y):
    # Calculating the best parameters
    X_train, X_test, y_train, y_test = train_test_split(X, Y, test_size=0.30, random_state=0)



    tree = DecisionTreeClassifier()
    featuresSize = 10
    # param_dist = {"max_depth": [3, None],
    #           "max_features": randint(1, featuresSize),
    #           "min_samples_split": randint(2, 9),
    #           "min_samples_leaf": randint(1, 9),
    #           "criterion": ["gini", "entropy"]}

    # forest = RandomForestClassifier(n_estimators = 20)

    #featuresSize = feature_cols.__len__()
    param_dist = {"max_depth": [3, None],
              "max_features": randint(1, featuresSize),
              "min_samples_split": randint(2, 9),
              "min_samples_leaf": randint(1, 9),
              "criterion": ["gini", "entropy"]}
    #tuningRandomizedSearchCV(forest, param_dist)          
    #tuningRandomizedSearchCV(tree, param_dist)

    forest = RandomForestClassifier(max_depth = None, min_samples_leaf=8, min_samples_split=2, n_estimators = 20, random_state = 1)
    my_forest = forest.fit(X_train, y_train)
    
    # make class predictions for the testing set
    

    # train a decision tree model on the training set
    # tree = DecisionTreeClassifier(max_depth=3, min_samples_split=8, max_features=6, criterion='entropy', min_samples_leaf=7)
    # tree.fit(X_train, y_train)

    # make class predictions for the testing set
   # y_pred_class = tree.predict(X_test)


    c1=np.array(c).reshape(-1, 10)

    #y_pred_class = tree.predict(c)
    y_pred_class = my_forest.predict(c1)
    #print('y_pred_class')
    return (y_pred_class)

##all has been from Machine Learning for Mental Health
##Nueral Network Remaining
##Prediction model alpha values aka coefficients are remaining

# @app.route('/health', methods=['GET','POST'])
# def index2():
#     if request.method == 'POST':
#         resp = request.json
#         # csv_update(resp)
#         test_data=[resp['1'],resp['2'],resp['3'],resp['4'],resp['5'],resp['6'],resp['7'],resp['8']]
#         res = treeClassifier(test_data)
#         print(res)
#         print(res[0].tostring())
#         if res[0] == 1 :
#            ans="Yes"
#         else:
#            ans="No"
#         response = jsonify({
#             "result": ans
#         })
#         return response
#     else:
#         return "get method!!!"

@app.route('/health', methods=['GET','POST'])
def index2():
    if request.method == 'POST':
        resp = request.json
        # csv_update(resp)
        # test_data=[resp['1'],resp['2'],resp['3'],resp['4'],resp['5'],resp['6'],resp['7'],resp['8']]
        test_data=[resp['age'],resp['gender'],resp['fmly_hist'],resp['past_mental'],resp['prdty_affect'],resp['percent_time'],resp['wrk_interfer'],resp['wrk_not_interfer']]
        res_treatment = treeClassifier(test_data,X1,y1)

        # test_data_2=[resp['1'],resp['2'],resp['9'],resp['10'],resp['11'],resp['12'],resp['13'],resp['14'],resp['15'],resp['16']]
        test_data_2=[resp['age'],resp['gender'],resp['anonymity'],resp['medical_leave'],resp['diss_pblm_coworker'],resp['diss_pblm_super'],resp['diss_result'],resp['health_view'],resp['health_handle'],resp['coworker_diss']]
        res_consequence = treeClassifier2(test_data_2,X2,y2)


        print(res_treatment)
        print(res_consequence)

        print(res_treatment[0].tostring())
        if res_treatment[0] == 1 :
           ans1="Yes"
        else:
           ans1="No"

        if res_consequence[0] == 1 :
           ans2="Yes"
        else:
           ans2="No"

        response = jsonify({
            "treatment": ans1,
            "fear"     : ans2
        })
        return response
    else:
        return "not expected input"

if __name__== "__main__" :
   app.run(host='127.0.0.1',debug=True)