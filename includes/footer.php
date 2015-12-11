    <div id="footer">
      <a class="btn-connexion" href="register.php" >inscription</a> /
      <a class="btn-connexion" href="connexion.php" >connexion</a> /
      <a class="btn-connexion" href="deconnexion.php" >déconnexion</a> /
      <a class="btn-connexion" href="voirprofil.php?m=2&action=consulter" >voir profil</a>
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
