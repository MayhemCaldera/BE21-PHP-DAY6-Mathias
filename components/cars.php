<div class="container">
<div class="manageProduct w-75 mt-3">    
   <div class='mb-3'>
   <a href= "./products/create.php"><button class='btn btn-primary'type="button" >Add Car</button></a>
   </div>
   <p class='h2'>Products</p>
   
   <table class='table table-striped'>
       <thead class='table-success'>
           <tr>
               <th>Picture</th>
               <th>Brand</th>
               <th>Model</th>
               <th>Status</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
          <?= $tbody_cars; ?>
          
       </tbody>
   </table>
</div>
</div>