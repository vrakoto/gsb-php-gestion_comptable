<script type="text/javascript" src="js/functions.js"></script>
<div id="contenu">
      <h2>Valider fiche de frais</h2>
      <h3>Mois et Visiteur à sélectionner : </h3>
      <form action="index.php?uc=ValiderFrais&action=ficheFrais" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <label for="lstMois" accesskey="n">Mois : </label>
        <select id="lstMois" name="lstMois">
            <?php
			foreach ($lesMois as $unMois)
			{
				?>
				<option><?php echo $unMois ?> </option>
				<?php 
			}
           
		   ?>    
            
        </select>
        
      <p>
	 
        <label for="lstVisiteur" accesskey="n">Visiteur : </label>
        <select id="lstVisiteur" name="lstVisiteur">
            <?php
			foreach ($lesVisiteurs as $unVisiteur)
			{
				?>
				<option value="<?php echo $unVisiteur['id'] ?>"><?php echo $unVisiteur['nom']." ".$unVisiteur['prenom'] ?> </option>
        <?php 
        var_dump($unVisiteur);
			}
           
		   ?>    
            
        </select>
      </p>

    </div>
          
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>