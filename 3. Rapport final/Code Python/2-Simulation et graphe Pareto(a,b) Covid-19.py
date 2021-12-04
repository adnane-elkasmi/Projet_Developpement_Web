#!/usr/bin/env python
# coding: utf-8


#importation des bibliothèque utile
import math as mt
import numpy as np
import matplotlib.pyplot as plt
from random import random



""" ________________simulation de la Pareto(a, b)______________"""


def pareto(a,b):
    U=random()
    X=b/(U**(1/a))
    return X

def graphe_pareto(a,b,Nmc):
    X=np.array([])
    for i in range(Nmc):
        X=np.append(X,pareto(a,b))
    y=f_x(X,0,0.2)[1]
    z=f_x(X,0,0.2)[0]
    plt.xlim=(0,5)
    plt.ylim=(0,3)
    plt.scatter(z,y,color='black',marker='.')
    plt.title('Densité empirique de v.a de Pareto a= et b=')  # Il faut choisir la valeur de n et beta
    plt.show()


def f_x(X,a,delta):
    N_x=200
    x=np.array([])
    proba=np.array([])
    Nmc=len(X)

    for i in range(N_x):

        x=np.append(x,a+delta*(i))
        counter=0

        for k in range(Nmc):
            if (x[i]<=X[k]<=x[i]+delta):
                counter +=1
        proba=np.append(proba,counter/(Nmc*delta))
    return(x, proba)
