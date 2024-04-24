<?php if (isset($_SESSION['pseudo']) or isset($_COOKIE['pseudo'])) {
    include './views/headerConnected.php';
} else {
    include './views/header.php';
} ?>

<body>
    <div class="parent_main_history">
        <div class="main_history">
            <h1>LA FORMULE 1</h1>
            <h2>L'histoire</h2>
            <blockquote>La Formule 1 (F1) est l'une des disciplines de course automobile les plus prestigieuses et les plus suivies au monde. Son histoire remonte à la première moitié du 20e siècle, lorsque des courses automobiles ont commencé à se dérouler en Europe, notamment en France et en Italie. <br><br>

                La F1 moderne telle que nous la connaissons aujourd'hui a officiellement débuté en 1950 avec le lancement du Championnat du monde de Formule 1 par la Fédération internationale de l'automobile (FIA). La première course s'est tenue à Silverstone, en Angleterre. <br><br>

                Depuis lors, la F1 a évolué pour devenir un spectacle mondial, attirant des équipes, des pilotes et des fans du monde entier. Les courses se déroulent sur des circuits prestigieux situés dans divers pays, offrant des défis uniques à chaque équipe et à chaque pilote. <br><br>

                La compétition en F1 est féroce, avec des équipes dépensant des millions pour développer des voitures rapides et des pilotes rivalisant pour la gloire et le titre de champion du monde des pilotes. Des icônes de la course comme Juan Manuel Fangio, Ayrton Senna, Alain Prost, Michael Schumacher et Lewis Hamilton ont marqué l'histoire de ce sport par leurs exploits sur la piste. <br><br>

                Au fil des décennies, la technologie a joué un rôle croissant dans la F1, avec des avancées constantes dans la conception des voitures, les systèmes de sécurité et les stratégies de course. La F1 est devenue un laboratoire pour l'innovation automobile, contribuant aux progrès de l'industrie automobile en général. <br><br>

                En plus des courses elles-mêmes, la F1 est également célèbre pour son glamour, ses personnalités flamboyantes et son aura de prestige. Les Grands Prix attirent des foules massives et sont diffusés à des millions de téléspectateurs à travers le monde, faisant de la F1 un phénomène culturel mondial.</blockquote>

            <h2>PHOTOS</h2>

            <!-- SLIDER -->
            <div id="slider">
                <div class="slider">
                    <div class="slider_content">
                        <div class="slider_content_item">
                            <img id="myImage" src="../assets/img/1.jpeg">
                            <img id="myImage" src="../assets/img/2.jpeg">
                            <img id="myImage" src="../assets/img/3.jpeg">
                            <img id="myImage" src="../assets/img/4.jpeg">
                            <img id="myImage" src="../assets/img/5.jpeg">
                        </div>
                    </div>

                    <div class="slider_nav">
                        <button onclick="left()" class="left-arrow"><img src="../assets/img/left.png"></button>
                        <button onclick="right()" class="right-arrow"><img src="../assets/img/right.png"></button>
                    </div>
                </div>
            </div>

            <div id="zoomedImage"></div>
            <!-- END SLIDER -->

            <h2>WORLD CHAMPION CONSTRUCTORS</h2>

            <div class="champion-div"><img class="champion" src="../assets/img/WorldChampion.jpg"></div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/script.js"></script>
</body>