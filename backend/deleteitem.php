<?php
if (isset($_REQUEST['delete'])) {
    $deletionid = (int) $_REQUEST['idfordeletion'];
    $delQuery = "DELETE FROM pinfo WHERE id = $deletionid ;";
    $delimgQuery = "SELECT img1,img2,img3,img4,img5 FROM pinfo WHERE id = $deletionid; ";
    $delimg = mysqli_query($conn, $delimgQuery);
    if (mysqli_num_rows($delimg) > 0) {
        $delrow = mysqli_fetch_assoc($delimg);
        for ($i = 1; $i <= 5; $i++) {
            $delFilename = $delrow["img$i"];
            if (file_exists($delFilename)) {
                unlink($delFilename);
            }
        }
    }
    if (mysqli_query($conn, $delQuery)) {
        echo "<h2> Product Deleted succesfully  </h2>";
    }

}
?>