Nmc = 10000;

//simulation loi de Gamma comme somme de n variables exponentielles

//simulation comme n=B variables aléatoires qui suivent une loi exponentielle
//Cette méthode ne marche que pour des beta entier.
function[X] = Gamma(apha,B)
    Y = -log(rand())/B;
    i = 1;
    while i<alpha
        Y = Y - log(rand())/B;
        i = i + 1;
    end
    X = Y;
endfunction

//coonstruction d'une chaine de valeur suivant une loi de Gamma comme somme de n variables exponentielles
function[X]=Chaine_de_valeur_gamma(alpha,B)
    for n=1: Nmc
        X(n)=Gamma(alpha,B);
    end
endfunction


//Cette fonction permet de contruire la fonction de densité de la fonction Gamma
function[x,D] = Densite_gamma(X)
    a = 0;
    b = 20;
    delta = 20*b/Nmc;
    for i=1:Nmc/20
        x(i) = a + delta*(i-1);
        c=0; //initialisation du compteur
        for n=1:Nmc
            if x(i) <= X(n) & X(n)< x(i) + delta
                c = c + 1;
            end
        end
        Proba(i)=c/Nmc;
        D(i)=Proba(i)/delta; //notre VA est continue
    end
endfunction

subplot(221)
Y1 = Chaine_de_valeur_gamma(1,1/2);
[x1,D1] = Densite_gamma(Y1);
plot(x1,D1);
xtitle("Simulation de loi gamma comme somme de lois exponentielles : alpha=1, beta=1/2");

