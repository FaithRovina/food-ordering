<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
         <h1> Manage Categories </h1> 

        <!-- Button for Adding Admin -->
        <a href="add_admin.php" class="btn-primary"> Add  Category </a>
         <br/> <br/> <br/>

         <table class="full-table">
            <tr>
                <th> Admin ID </th>
                <th> Name </th>
                <th> Username </th>
                <th> Actions </th>
            </tr>

            <tr>
                <td> 01832025 </td>
                <td> Faith Rovina </td>
                <td> faith_rovina </td>
                <td> 
                <a href="#" class="btn-secondary"> Update  Category </a>
                <a href="#" class="btn-danger"> Delete Category </a>                    
                    
                </td>
                
            </tr>

            <tr>
                <td> 21832024 </td>
                <td> Ngala Rovina </td>
                <td> ngala_rovina </td>
                <td> 
                <a href="#" class="btn-secondary"> Update Category </a>
                <a href="#" class="btn-danger"> Delete  Category </a>
                </td>
                
            </tr>

            <tr>
                <td> 01932025 </td>
                <td> Faith Ngala </td>
                <td> faith_ngala </td>
                <td> 
                <a href="#" class="btn-secondary"> Update  Category </a> 
                <a href="#" class="btn-danger"> Delete  Category </a>
                </td>
                
            </tr>

         </table>

        </div>
    </div>
<?php include('partials/footer.php');