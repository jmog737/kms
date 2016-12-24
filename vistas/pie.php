    <div id='pie'> 
      <?php
      if (!empty($_SESSION['user_id']))
        {
      ?>
        <font class='azul'>Usuario:</font> 
      <?php
        // Confirm the successful log-in
        echo $_SESSION['username'];
      ?>
      <font class='derecha'><a href="logout.php">Salir</a></font>
      <?php
        }
      ?>
    </div> <!-- fin del div pie -->
  </div> <!-- fin del div global -->
</html>