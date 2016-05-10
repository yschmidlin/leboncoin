
<header>
    <img src="logo_25.png" alt="logo" title="Mon projet web" />



    <?php if ($_SESSION['oUser'] instanceof user) { ?>
        <span>Connecte sous <?php echo $_SESSION['oUser']->getEmail(); ?></span></br>
        <a href='index.php?logout'>Se deconnecter</a>
    <?php } else { ?>
        <form method="POST">
            <!-- Généralement on ajoute un élément LABEL pour chaque champ de formulaire afin de préciser la teneur du champ. On lie ces deux champs via l'attribut "for" sur l'élément LABEL -->
            <label for="email">Email</label>
            <!-- Les champs de formulaire (input, textarea, select) doivent avoir un attribut "name" qui correspondra à la clé de notre tableau PHP quand nous récupérons les données de notre formulaire -->
            <input type="email" id="email" name="email" required />

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required />

            <input type="submit" name="loginForm" value="Se connecter" />
        </form>
        <?php
    }
    ?>

    <!-- On utilise la nouvelle balise HTML5 "nav" pour indiquer un élement de navigation dans notre site -->
    <nav>
        <ul>
            <li><a href="index.php?page=home" alt="">Accueil</a></li>
            <li><a href="index.php?page=depot_annonce" alt="">Deposer une annonce</a></li>
            <li><a href="index.php?page=contact" alt="">contact</a></li>

            <li><button id="btn1">homeAjax</button></li>
            <li><button id="btn2">contactAjax</button></li>
        </ul>

    </nav>

    <script>
        btn1.addEventListener('click', callback1);
        btn2.addEventListener('click', callback2);

        function callback1() {
            $.ajax({
                async: true,
                type: "GET",
                url: "ajax.php?page=home",
                error: function (errorData) {

                },
                success: function (data) {
                    //elt_monDiv = document.querySelector('#mainView');
                    //elt_monDiv.innerHTML = data;

                    $('#mainView').html(data);
                }
            });
        }

        function callback2() {
            $.ajax({
                async: true,
                type: "GET",
                url: "ajax.php?page=contact",
                error: function (errorData) {

                },
                success: function (data) {
                    //elt_monDiv = document.querySelector('#mainView');
                    //elt_monDiv.innerHTML = data;

                    $('#mainView').html(data);
                }
            });
        }
    </script>
</header>