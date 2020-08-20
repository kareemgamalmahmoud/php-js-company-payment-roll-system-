<?php
    
    require_once "../conn.php";
    session_start();
    
    if ( isset($_POST['submit']) ) 
    {
        $sql = "DELETE FROM employee WHERE eid = :zip";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':zip' => $_GET['eid']));
        $_SESSION['success'] = 'Record deleted';

        header( 'Location: report.php' ) ;
            return;
    }
    
    $stmt = $conn->prepare("SELECT ename, eid FROM employee where eid = :xyz");
    $stmt->execute(array(":xyz" => $_GET['eid']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ( $row === false ) 	
    {
        $_SESSION['error'] = 'Bad value for id';
        header( 'Location: report.php' ) ;
            return;
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    
    <body>
        <center>
            <table>
                <tr>
                    <td>
                        <div class="box">

                            
                            <p style="color: aliceblue">Are you sure you want to Delete  <?php echo"$row[ename]"; ?> ? </p>

                                <form method="post" >
                                    
                                    <input style="border-radius:60px;" type="submit" name="submit" value="Delete" onclick="">
                                    <button><a href="report.php" style="text-decoration: none;color: white; padding: 10px;" target="iframe"> cancel </a></button>
                                </form>
                            
                        </div>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>