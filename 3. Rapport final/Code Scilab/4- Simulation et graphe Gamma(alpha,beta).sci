Nmc=10000;

//densité de la loi Gamma
function[y] = f_Gamma(a,b,x)
    y=((b^a)/gamma(a))*exp(-b*x)*(x^(a-1));
endfunction

//Parametre de rejet C>1 il faut que b>d et n<a<n+1
function[c] = C(a,b,n,d)
    c=(gamma(n)/gamma(a))*((b^a)/(d^n))*(((a-n)/(b-d))^(a-n))*exp(-(a-n))
endfunction



function[X] = V_A_Gamma(a,b)
    U=rand();
    Y = -log(1-U)/b;
    i = 1;
    while i<a
        Y = Y - log(1-U)/b;
        i = i + 1;
    end
    X = Y;
endfunction

function[X] = Rajet_Gamma(a,b,n,d)
    U=rand();
    Y=V_A_Gamma(n,d);
    if U<=(f_Gamma(a,b,Y)/(C(a,b,n,d)*f_Gamma(n,d,Y))) 
        X=Y;
    end
endfunction


function[x,D] = Densite_gamma(X)
    a = 0;
    b = 20;
    delta = 20*b/Nmc;
    for i=1:Nmc/20
        x(i) = a + delta*(i-1);
        c=0; 
        for n=1:Nmc
            if x(i) <= X(n) & X(n)< x(i) + delta
                c = c + 1;
            end
        end
        Proba(i)=c/Nmc;
        D(i)=Proba(i)/delta; 
    end
endfunction

function[X]=Chaine_de_valeur_gamma(a,b,n,d)
    for n=1: Nmc
        X(n)=Rajet_Gamma(a,b,n,d);
    end
endfunction

subplot(421);
Y1 = Chaine_de_valeur_gamma(5/2,1/2,2,1/4);
[x1,D1] = Densite_gamma(Y1,1.8);
plot2d(x1,D1);
xtitle("densité empirique d''une loi Gamma par méthode de rejet : alpha=5/2 beta=1/2");

