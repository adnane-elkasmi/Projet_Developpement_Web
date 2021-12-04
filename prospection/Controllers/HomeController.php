<?php
    class HomeController
    {
        public function home(){
            require_once "home.php";
        }
	
        public function login(){
            require_once "Views/Login/login.php";
        }

        public function logout(){
            require_once "Views/Logout/logout.php";
        }

        public function deletefile(){
            require_once "Views/Administrateurs/documents/deletefile.php";
        }

        public function documents(){
            require_once "Views/Administrateurs/documents/documents.php";
        }
        
        public function upload(){
            require_once "Views/Administrateurs/documents/upload.php";
        }

        public function accueil_admin(){
            require_once "Views/Administrateurs/etablissements/accueil_admin.php";
        }
        
        public function attente(){
            require_once "Views/Administrateurs/etablissements/attente.php";
        }
        
        public function noForum(){
            require_once "Views/Administrateurs/etablissements/noForum.php";
        }
        
        public function analyse(){
            require_once "Views/Administrateurs/extraction/analyse.php";
        }
        
        public function extraction(){
            require_once "Views/Administrateurs/extraction/extraction.php";
        }

        public function fiche_lycees(){
            require_once "Views/Administrateurs/fiche/fiche_lycees.php";
        }

        public function InfoInscritCergy(){
            require_once "Views/Administrateurs/fiche/InfoInscritCergy.php";
        }

        public function InfoInscritPau(){
            require_once "Views/Administrateurs/fiche/InfoInscritPau.php";
        }

        public function gestion(){
            require_once "Views/Administrateurs/gestion/gestion.php";
        }
        
        public function supprimer(){
            require_once "Views/Administrateurs/gestion/supprimer.php";
        }

        public function compteRendu(){
            require_once "Views/CompteRendu/compteRendu.php";
        }
        
        public function documents_eleves(){
            require_once "Views/Eleves/documents/documents_eleves.php";
        }
        
        public function accueil_eleves(){
            require_once "Views/Eleves/etablissements/accueil_eleves.php";
        }
        
        public function attente_eleves(){
            require_once "Views/Eleves/etablissements/attente_eleves.php";
        }
        
        public function noForum_eleves(){
            require_once "Views/Eleves/etablissements/noForum_eleves.php";
        }
        
        public function compte_rendu(){
            require_once "Views/Eleves/forums/compte_rendu.php";
        }
        
        public function mes_prospections(){
            require_once "Views/Eleves/forums/mes_prospections.php";
        }

        public function terminees(){
            require_once "Views/Eleves/forums/terminees.php";
        }
    }
?>