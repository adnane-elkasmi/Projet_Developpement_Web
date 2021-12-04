                    #---------------------------------------------------------#
                    # 1. Processus de comptage Nt par deux façons différentes #
                    #---------------------------------------------------------#

# importer les bibliothèques #

from math import *
from numpy import *
from random import *
from matplotlib.pyplot import *

#--------------------------------------------------------------------------------#
# Simulation d’une v.a. Exponentielle:(Par invertion de fonction de Répartition) #
#--------------------------------------------------------------------------------#

def V_A_Exponentielle(λ):
    U=random()
    X=-(1/λ)*log((1-U))
    return X

def Chaine_V_A_Exponentielle(λ, Nmc):
    l=[]
    for i in range(0,Nmc):
        l.append(V_A_Exponentielle(λ))
    return l

#----------------------------#
# Verification de simulation #
#----------------------------#

def E_empirique_Exponentielle(λ,Nmc):
    X=Chaine_V_A_Exponentielle(λ, Nmc)
    E=(1/Nmc)*(sum(X[i] for i in range(0,Nmc)))
    return E

def Var_empirique_Exponentielle(λ,Nmc):
    X=Chaine_V_A_Exponentielle(λ, Nmc)
    E=(1/Nmc)*(sum(X[i] for i in range(0,Nmc)))
    D=(1/Nmc)*(sum(pow(X[i],2) for i in range(0,Nmc)))
    return(D-pow(E,2))

#----------------------------------------------------------------------------#
# Simulation du processus de comptage Nt ( Methode 1: Par définition de Nt ) #
#----------------------------------------------------------------------------#

def V_A_Processus_Comptage(λ,t,N):                 #ici N represente un grand nombre pour modeliser l'infini (N>>100)#
    z=[]
    Nt=0
    for k in range(1,N+1):
        for i in range(1,k+1):
          z.append(V_A_Exponentielle(λ))
        if (sum(z[j] for j in range(0,k)))<=t:     # T(k)<=t#
            Nt=Nt+1
    return Nt

def Chaine_V_A_Processus_Comptage(λ,t,N,Nmc):      #ici N represente un grand nombre pour modeliser l'infini (N>>100)#
    l=[]
    for i in range(0,Nmc):
        l.append(V_A_Processus_Comptage(λ,t,N))
    return l

#----------------------------#
# Verification de simulation #
#----------------------------#

def E_empirique_Processus_Comptage(λ,t,N,Nmc):     #ici N represente un grand nombre pour modeliser l'infini (N>>100)#
    X=Chaine_V_A_Processus_Comptage(λ,t,N,Nmc)
    E=(1/Nmc)*(sum(X[i] for i in range(0,Nmc)))
    return E

def Var_empirique_Processus_Comptage(λ,t,N,Nmc):   #ici N represente un grand nombre pour modeliser l'infini (N>>100)#
    X=Chaine_V_A_Processus_Comptage(λ,t,N,Nmc)
    E=(1/Nmc)*(sum(X[i] for i in range(0,Nmc)))
    D=(1/Nmc)*(sum(pow(X[i],2) for i in range(0,Nmc)))
    return(D-pow(E,2))

#-------------------------------------------------------------------------------------------------#
# Simulation du processus de comptage Nt ( Methode 2: Par définition de loi de Poisson composée ) #
#-------------------------------------------------------------------------------------------------#

def V_A_Poisson_Composee(µ,t):
    X=np.random.poisson(µ*t)
    return X

def Chaine_V_A_Poisson_Composee(µ,t,Nmc):
    l=[]
    for i in range(0,Nmc):
        l.append(V_A_Poisson_Composee(µ,t))
    return l

#----------------------------#
# Verification de simulation #
#----------------------------#

def E_empirique_Poisson_Composee(µ,t,Nmc):
    X=Chaine_V_A_Poisson_Composee(µ,t,Nmc)
    E=(1/Nmc)*(sum(X[i] for i in range(0,Nmc)))
    return E

def Var_empirique_Poisson_Composee(µ,t,Nmc):
    X=Chaine_V_A_Poisson_Composee(µ,t,Nmc)
    E=(1/Nmc)*(sum(X[i] for i in range(0,Nmc)))
    D=(1/Nmc)*(sum(pow(X[i],2) for i in range(0,Nmc)))
    return(D-pow(E,2))

#------------------------------------------------#
# Densité empirique de v.a de Poisson composée   #
#------------------------------------------------#

def f_x(X,a,delta):
    N_x=200
    x=array([])
    proba=np.array([])
    Nmc=len(X)

    for i in range(N_x):

        x=append(x,a+delta*(i))
        counter=0

        for k in range(Nmc):
            if (x[i]<=X[k]<=x[i]+delta):
                counter +=1
        proba=append(proba,counter/(Nmc*delta))
    return(x, proba)



def graphe_Poisson(µ,t,Nmc):
    X=array([])
    for i in range(Nmc):
        X=append(X,V_A_Poisson_Composee(µ,t))
    y=f_x(X,0,0.1)[1]
    z=f_x(X,0,0.1)[0]
    bar(z,y,0.2,color='black')
    title('Densité empirique de v.a de Poisson pour t= et lambda=')  # Il faut choisir la valeur de lambda
    show()


#-------------------------------------------------------#
# Simulation de loi Gamma(α,β) avec α,β>0               #
#-------------------------------------------------------#

def V_A_Gamma(α,β):
    X=np.random.gamma(α,β)
    return X

def Chaine_V_A_Gamma(α,β,Nmc):
    l=[]
    for i in range(0,Nmc):
        l.append(V_A_Gamma(α,β))
    return l

def graphe_Gamma(α,β,Nmc):
    X=array([])
    for i in range(Nmc):
        X=append(X,V_A_Gamma(α,β))
    y=f_x(X,0,0.15)[1]
    z=f_x(X,0,0.15)[0]
    scatter(z,y,color='black')
    title('Densité empirique de v.a de Poisson pour alpha= et beta=')  # Il faut choisir la valeur de lambda
    show()

#-------------------------------------------------------#
# Simulation de loi Pareto(a,b) avec a,b>0              #
#-------------------------------------------------------#

def pareto(a,b):
    U=random()
    X=b/(U**(1/a))
    return X

def graphe_pareto(a,b,Nmc):
    X=np.array([])
    for i in range(Nmc):
        X=np.append(X,pareto(a,b))
    y=f_x(X,0,0.1)[1]
    z=f_x(X,0,0.1)[0]
    xlim=(0.5)
    ylim=(0,3)
    scatter(z,y,color='black',marker='.')
    title('Densité empirique de v.a de Pareto a= et b=')  # Il faut choisir la valeur de n et beta
    show()

#-----------------------------------------------------------#
# Simulation RT {c = 14; α = 2.5; λ = 2; β = 0.5; x = 250 } #
#-----------------------------------------------------------#

def Rt(x,c,λ,α,β,t):
    Nt=V_A_Poisson_Composee(λ,t)
    Z=[]
    for k in range(0,Nt):
        Z.append(V_A_Gamma(α,β))
    return x+c*t-sum(Z)


def grapheRt(x,c,λ,α,β):

    t=linspace(0.,50.,100)
    y=Rt(x,c,λ,α,β,t)
    plot(t,y)
    show()












