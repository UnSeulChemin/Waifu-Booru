<header>

    <nav>

        <div>
			<h1>Waifu Booru</h1>
		</div>

        <div>
            <?php
            // Accueil
            if (!isset($_GET['page']) || isset($_GET['page']) && empty($_GET['page']))
            {
                ?> <a class="actif" href="./">Accueil</a> <?php
            }

            else if (isset($_GET['id']) && !empty($_GET['id']))
            {
                ?> <a href="../">Accueil</a> <?php
            }
            
            else
            {
                ?> <a href="./">Accueil</a> <?php	
            }

            // Waifu
            if (!isset($_GET['page']) || isset($_GET['page']) && empty($_GET['page']))
            {
                ?> <a class="actif" href="waifu">Waifu</a> <?php
            }

            else if (isset($_GET['id']) && !empty($_GET['id']))
            {
                ?> <a href="../waifu">Waifu</a> <?php
            }
            
            else
            {
                ?> <a href="waifu">Waifu</a> <?php	
            }
            ?>
        </div>

    </nav>

</header>
