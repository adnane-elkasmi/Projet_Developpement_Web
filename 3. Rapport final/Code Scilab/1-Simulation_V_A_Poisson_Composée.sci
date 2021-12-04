Nmc = 10000;

// Simulation loi poisson composée

function[X] = Poisson(lambda)
    n=0;
    proba=exp(-lambda);
    F=proba;
    U=rand();
    while U>F
        proba=(lambda/(n+1))*proba;
        F=F+proba;
        n=n+1;
    end
    X=n;
endfunction

// Construction d'une chaine de valeur suivant une loi de Poisson
function[X]=Chaine_de_valeur_poisson(lambda)
    for n=1: Nmc
        X(n)=Poisson(lambda);
    end
endfunction

// Construction de la fonction de densité empirique
function[Densite] = Densite_poisson(X)
    a = 0;
    b = 15; //on découpe en Nmc intervalles de 1
    delta = 1;
    for i=1:b+1
        x(i) = a + delta*(i-1);
        c=0; //initialisation du compteur
        for n=1:Nmc
            if x(i) <= X(n) & X(n)< x(i) + delta
                c = c + 1;
            end
        end
        Proba(i)=c/Nmc;
        Densite(i)=Proba(i)/1; //notre VA est discrète
    end
endfunction

X1 = Chaine_de_valeur_poisson(2);
X2 = Chaine_de_valeur_poisson(5);
X3 = Chaine_de_valeur_poisson(1/24);

D1=Densite_poisson(X1);
D2=Densite_poisson(X2);
D3=Densite_poisson(X3);

x = linspace(0,10,1)

subplot(221);
plot2d3(D1);
xtitle("Densité empirique de v.a de Poisson avec lambda=2")
subplot(222);
plot2d3(D2);
xtitle("Densité empirique de v.a de Poisson avec lambda=5")
subplot(223);
plot2d3(D3);
xtitle("Densité empirique de v.a de Poisson avec lambda=1/24")
