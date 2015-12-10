<?php
//Cette fonction doit être appelée avant tout code html
    session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
    $titre = "Index du forum";
    include("includes/identifiants.php");
    include("includes/debut.php");
    include("includes/menu.php");
?>


<?php
    //Initialisation de deux variables
    $totaldesmessages = 0;
    $categorie = NULL;
?>

<?php

    //Cette requête permet d'obtenir tout sur le forum
    $query=$db->prepare('SELECT cat_id, cat_nom, 
    forum_forum.forum_id, forum_name, forum_desc, forum_post, forum_topic, auth_view, forum_topic.topic_id,  forum_topic.topic_post, post_id, post_time, post_createur, membre_pseudo, 
    membre_id 
    FROM forum_categorie
    LEFT JOIN forum_forum ON forum_categorie.cat_id = forum_forum.forum_cat_id
    LEFT JOIN forum_post ON forum_post.post_id = forum_forum.forum_last_post_id
    LEFT JOIN forum_topic ON forum_topic.topic_id = forum_post.topic_id
    LEFT JOIN forum_membres ON forum_membres.membre_id = forum_post.post_createur
    WHERE auth_view <= :lvl 
    ORDER BY cat_ordre, forum_ordre DESC');
    $query->bindValue(':lvl',$lvl,PDO::PARAM_INT);
    $query->execute();
?>
<table>
<?php
    while($data = $query->fetch())
    {
    if( $categorie != $data['cat_id'] )
    {
       
        $categorie = $data['cat_id'];?>
	<tr class="tr-base">
        <th class="titre"><strong><?php echo stripslashes(htmlspecialchars($data['cat_nom'])); ?></strong></th>             
        <th class="nombremessages">Sujets</strong></th>       
        <th class="nombresujets">Messages</th>       
        <th class="derniermessage">Dernier message</th>   
	</tr>
        <?php
               
    }

    ?>
<?php

        echo'<tr>
	        <td class="titre"><strong>
		    <a href="./voirforum.php?f='.$data['forum_id'].'">
		        '.stripslashes(htmlspecialchars($data['forum_name'])).'</a></strong>
			<br /><div class="descr-rubri">'.nl2br(stripslashes(htmlspecialchars($data['forum_desc']))).'</div></td>
			        <td class="nombresujets">'.$data['forum_topic'].'</td>
				    <td class="nombremessages">'.$data['forum_post'].'</td>';

        if (!empty($data['forum_post']))
	        {
			 $nombreDeMessagesParPage = 15;
			          $nbr_post = $data['topic_post'] +1;
			     $page = ceil($nbr_post / $nombreDeMessagesParPage);
				 
         echo'<td class="derniermessage">
         '.date('H\hi \l\e d/M/Y',$data['post_time']).'<br />
         <a href="./voirprofil.php?m='.stripslashes(htmlspecialchars($data['membre_id'])).'&amp;action=consulter">'.$data['membre_pseudo'].' </a></td></tr>';

			      }
         else
	          {
		               echo'<td class="nombremessages">Pas de message</td></tr>';
			            }

     $totaldesmessages += $data['forum_post'];

    }


$query->CloseCursor();
echo '</table></div>';
?>
<div id="footer">
    <a class="btn-connexion" href="connexion.php" >connexions</a>
<?php
$TotalDesMembres = $db->query('SELECT COUNT(*) FROM forum_membres')->fetchColumn();
$query->CloseCursor();	
$query = $db->query('SELECT membre_pseudo, membre_id FROM forum_membres ORDER BY membre_id DESC LIMIT 0, 1');
$data = $query->fetch();
$derniermembre = stripslashes(htmlspecialchars($data['membre_pseudo']));
?>

    <p>Le total des messages du forum est <strong><?php echo $totaldesmessages ?></strong>.<br />
Le site et le forum comptent <strong><?php echo $TotalDesMembres; ?></strong> membres.<br /></p>
<?php $query->CloseCursor();?>
    </div>
    </body>
    </html>
