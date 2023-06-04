<div id="insert-form">
    <button id="close-btn">x</button>
    <form action="../backend/insert.php" method="POST" enctype="multipart/form-data">
        <div class="names form-elements">
            <div><label for="pname" class="input-label">Product Name: </label><span style="color: red;">*</span>
                <input class="input" type="text" placeholder=" enter product name" name="pname" required>
            </div>
            <div><label for="bname" class="input-label">Brand Name: </label>
                <input class="input" type="text" placeholder=" enter brand name" name="bname">
            </div>
        </div>
        <label for="desc" class="input-label form-elements">Description</label>
        <textarea placeholder="write down the product description" name="desc" cols="30" rows="10"></textarea>
        <label for="volume " class="input-label form-elements"> Product Weight/Volume<span
                style="color: red;">*</span></label>
        <input class="input" type="text" placeholder=" also enter measuring units (gm/kg/L)" id="vol" name="volume"
            required>
        <div class="prices form-elements">
            <div><label for="mrp" class="input-label">MRP price: </label><span style="color: red;">*</span>
                <input class="input" type="text" placeholder=" enter MRP" name="mrp" required>
            </div>
            <div><label for="sp" class="input-label">Selling price: </label><span style="color: red;">*</span>
                <input class="input" type="text" placeholder=" enter Selling price" name="sp" required>
            </div>
        </div>
        <div class="existing-cat">
            <label for="category" class="input-label">Product category: </label><span style="color: red;">*</span>
            <select name="category">
                <option value="none" selected hidden>Select an Option</option>
                <?php
                $catQuery = "SELECT catname FROM pcat ;";
                $catdata = mysqli_query($conn, $catQuery);
                if (mysqli_num_rows($catdata) > 0) {
                    while ($row = mysqli_fetch_assoc($catdata)) {
                        echo " <option value ='{$row['catname']}' >" . $row['catname'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="category form-elements">
            <label for="newcat" class="input-label">Add new category:</label>
            <input class="input" type="text" placeholder=" add new category" name="newcat">
            <div class="cat-input-centre"><label for="newcatimg" class="input-label">Upload new Catagory image: </label>
                <input type="file" name="newcatimg" accept=".jpeg,.png,.jpg" class="margin-left">
            </div>

        </div>
        <div class="ratings form-elements">
            <label for="ratings" class="input-label">Product ratings: </label>
            <select name="ratings">
                <?php
                $i = 5.0;
                while ($i >= 1.0) {
                    echo " <option value = '$i' >$i</option>";
                    $i = $i - 0.1;
                }
                ?>
            </select>
        </div>
        <div class="image form-elements">
            <label for="img1" class="input-label">Upload Product Image 1:<span style="color: red;">*</span> </label>
            <input type="file" name="img1" accept=".jpeg,.png,.jpg" required>
            <label for="img2" class="input-label">Image 2: </label>
            <input type="file" name="img2" accept=".jpeg,.png,.jpg">
            <label for="img4" class="input-label">Image 3: </label>
            <input type="file" name="img3" accept=".jpeg,.png,.jpg">
            <label for="img4" class="input-label">Image 4: </label>
            <input type="file" name="img4" accept=".jpeg,.png,.jpg">
            <label for="img5" class="input-label">Image 5: </label>
            <input type="file" name="img5" accept=".jpeg,.png,.jpg">

        </div>
        <div class="btn form-elements">
            <input type="submit" value="Add Product" name="submit" id="form-insert-btn">
            <input type="reset" value="Reset" id="form-reset-btn">
        </div>

    </form>
</div>