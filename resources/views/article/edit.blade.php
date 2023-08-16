<h1>Edita il tuo prodotto:</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
           <form method="POST" action="" enctype="multipart/form-data">
           
            @csrf
            @method('put')

            <div class="mb-3">
              <label for="name" class="form-label">Nome Prodotto</label>
              <input type="text" class="form-control" name="name" id="name" value="">
            </div> 

            <div class="mb-3">
              <label for="image" class="form-label">Immagine</label>
              <input type="file" class="form-control" id="image" name="img">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10" value=""></textarea>
              </div>

            

              <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" value="">
              </div>
              
              <div class="mb-3">
                <label for="category" class="form-label">Categoria</label>
                <input type="text" class="form-control" name="category" id="category" value="">
              </div>
            
           <img src="" alt="" class="d-block">
             
         
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>