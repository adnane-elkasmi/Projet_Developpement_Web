             #------ Livrable 2 ------#


# importer les bibliothèques #

from math import *
from numpy import *
from random import *
from matplotlib.pyplot import *

#------------------------------------------------------------------#
# Remarque: dans cette partie on a utilisé la simulation des v.a:  #
# Poisson, Gamma et Pareto avec la methode directe grace à la      #
# bibliothèque numpy afin d'avoir des résultats cohérents          #
#------------------------------------------------------------------#

#----------------------------------------#
# Simulation de loi de Poisson composée  #
#----------------------------------------#

def V_A_Poisson_Composee(λ,t):
    X=np.random.poisson(λ*t)
    return X


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


#-------------------------------------------------------#
# Simulation de loi Pareto(a,b) avec a,b>0              #
#-------------------------------------------------------#

def V_A_Pareto(a,b):
    U=random()
    X=b/(U**(1/a))
    return X

def graphe_pareto(a,b,Nmc):
    X=np.array([])
    for i in range(Nmc):
        X=np.append(X,V_A_Pareto(a,b))
    y=f_x(X,0,0.1)[1]
    z=f_x(X,0,0.1)[0]
    xlim=(0.5)
    ylim=(0,3)
    scatter(z,y,color='black',marker='.')
    title('Densité empirique de v.a de Pareto a= et b=')  # Il faut choisir la valeur de n et beta
    show()

#--------------------------------------------------------#
# Simulation Rt à queues fines : Zk -> Gamma(α,β)        #
#-------------- -----------------------------------------#


def Rt_fines(x,c,λ,α,β,t):

    Nt=V_A_Poisson_Composee(λ,t)
    Z=[]
    for k in range(0,Nt):
        Z.append(V_A_Gamma(α,β))
    return x+c*t-sum(Z)


def grapheRt_fines(x,c,λ,α,β):

    t=np.linspace(0.,50.,100)
    y=[Rt_fines(x,c,λ,α,β,i) for i in t]
    plot(t,y)
    xlabel("temps t")
    ylabel("la réserve de la compagnie d'assurance Rt")
    title("Modèle de Lundberg-Cramer (à queues fines)")
    show()



#--------------------------------------------------------#
# Simulation Rt à queues loude : Zk -> Pareto(a,b)       #
#-------------- -----------------------------------------#

def Rt_lourde(x,c,λ,a,b,t):

    Nt=V_A_Poisson_Composee(λ,t)
    Z=[]
    for k in range(0,Nt):
        Z.append(V_A_Pareto(a,b))
    return x+c*t-sum(Z)


def grapheRt_lourde(x,c,λ,a,b):

    t=np.linspace(0.,50.,100)
    y=[Rt_lourde(x,c,λ,a,b,i) for i in t]
    plot(t,y)
    xlabel("temps t")
    ylabel("la réserve de la compagnie d'assurance Rt")
    title("Modèle de Lundberg-Cramer (à queues lourde)")
    show()


#----------------------------------------------------------------------------------#
# Simulation XT et Probabilité de ruine (à queues fines) : Zk -> Gamma(α,β)        #
#-------------- -------------------------------------------------------------------#

def V_A_X_fines(λ,T,α,β):
    NT=V_A_Poisson_Composee(λ,T)
    Z=[]
    for k in range(0,NT):
        Z.append(V_A_Gamma(α,β))
    return sum(Z)

def Proba_ruine_fines(c,x,T,λ,α,β,Nmc):
    a=x+c*T
    counter=0
    for n in range(1,Nmc+1):
          X=V_A_X_fines(λ,T,α,β)
          if X>a:
              counter=counter+1
    return counter/Nmc

#----------------------------------------------------------------------------------#
# Simulation XT et Probabilité de ruine (à queues lourde) : Zk -> Pareto(a,b)      #
#-------------- -------------------------------------------------------------------#

def V_A_X_lourde(λ,T,a,b):
    NT=V_A_Poisson_Composee(λ,T)
    Z=[]
    for k in range(0,NT):
        Z.append(V_A_Pareto(a,b))
    return sum(Z)

def Proba_ruine_lourde(c,x,T,λ,a,b,Nmc):
    a=x+c*T
    counter=0
    for n in range(1,Nmc+1):
          X=V_A_X_lourde(λ,T,a,b)
          if X>a:
              counter=counter+1
    return counter/Nmc


#----------------------------------------------------------------------------------#
# Estimation de l'instant de la ruine Tx (à queues fines) : Zk -> Gamma(α,β)       #
#-------------- -------------------------------------------------------------------#

def Tx_fines(x,c,λ,α,β,delta):
    t=0
    while Rt_fines(x,c,λ,α,β,t)>0:
        t=t+delta
    return t

#----------------------------------------------------------------------------------#
# Estimation de l'instant de la ruine Tx (à queues fines) : Zk -> Pareto(a,b)      #
#-------------- -------------------------------------------------------------------#

def Tx_lourde(x,c,λ,a,b,delta):
    t=0
    while Rt_lourde(x,c,λ,a,b,t)>0:
        t=t+delta
    return t


#----------------------------------------------------------#
# Simulation Importance Sampling : Zk_Q -> Gamma(α,β-θ)    #
#-------------- -------------------------------------------#


def V_A_X_Q(c,x,λ,T,α,β):
    θ=β-β*pow((β*(x+c*T))/(α*λ*T),-1/(α+1))
    λQ=λ*pow(β/(β-θ),α)
    NT=V_A_Poisson_Composee(λQ,T)
    Z=[]
    for k in range(0,NT):
        Z.append(V_A_Gamma(α,β-θ))
    return sum(Z)


def Proba_ruine_Q(c,x,T,λ,α,β,Nmc):
    θ=β-β*pow((β*(x+c*T))/(α*λ*T),-1/(α+1))
    Γθ=λ*T*(pow(β/(β-θ),α)-1)
    a=x+c*T
    counter=0
    for n in range(1,Nmc+1):
          X=V_A_X_Q(c,x,λ,T,α,β)
          if X>a:
              counter=counter+exp(-θ*X+Γθ)
    return counter/Nmc

