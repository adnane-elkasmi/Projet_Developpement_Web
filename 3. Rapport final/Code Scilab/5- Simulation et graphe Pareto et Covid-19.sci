Nmc = 10000;
//Modélisation des domages causés par le COVID -19 par une valiable aléatoire de Pareto

//On utilise la méthode d'inversion de la fonction de répartition

function[X] = Pareto(k,xm)
    X = xm*rand()^k;
endfunction

function[X] = Chaine_de_valeur_pareto(k,xm)
    for i=1:Nmc
        X(i)=Pareto(k,xm);
    end
endfunction

function[Densite] = Densite_pareto(X)
    a = 0;
    b = 5;
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
        Densite(i)=Proba(i)/delta; //notre VA est continue
    end
    plot(x,Densite);
    xtitle("fonction de densité empirique d''une variable aléatoire suivant la loi de Pareto a=2 et b=3");
endfunction

disp("La loi de Pareto peut permettre de modéliser le coût d''un sinistre grve");

W = Chaine_de_valeur_pareto(2,3);
D=Densite_pareto(W);
