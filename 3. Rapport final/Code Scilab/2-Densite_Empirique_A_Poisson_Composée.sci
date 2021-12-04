// 1. Processus de comptage

clear ;

Nmc = 10000;


// On compte le nombre de sinistre entre l'instant 0 et la date t :

function[X] = Expo(lambda)
    X=-log(rand())/lambda;
endfunction

// Cette fonction calcul le nombre de sinistre pendant une durée t
function[N] = Comptage(t,lambda)
    c=0;
    T=0;
    while T<=t
        tau = Expo(lambda);
        T = T+tau;
        c=c+1;
        N=c
    end
endfunction

N1 = Comptage(1,2);
N2 = Comptage(1,5);
N3 = Comptage(1,1/24);

disp("Affichage du nombre de sinistre pour différents jeux de paramêtres")
disp("Pour t=1 et lambda=2 alors    Nt = "+string(N1));
disp("Pour t=1 et lambda=5 alors    Nt = "+string(N2));
disp("Pour t=1 et lambda=1/24 alors Nt = "+string(N3));




