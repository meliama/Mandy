<div>
  <label class="input-label">Nombre: </label> <br>
  <input type="text" name="name" value=" {{ old("name", $product->name) }} ">
</div>
<br>

<div>
  <label class="input-label">Descripción: </label> <br>
  <textarea name="description">{{ old("description", $product->description) }}</textarea>
</div>
<br>
<div>
  <label class="input-label">Precio: </label> <br>
  <input type="text" name="price"  value=" {{ old("price", $product->price) }} ">
</div>
<br>
<div>
  <label class="input-label">Stock: </label> <br>
  <input type="text" name="stock" value=" {{ old("stock", $product->stock) }} ">
</div>
<br>
<div>
  <label class="input-label">Categoría: </label> <br>
  <select name="category_id">
    <option>Elegir:</option>
    @forelse ($categories as $category)
       <option value= {{$category->id}}
         @if ($category->id == old('category_id', $product->category_id))
              selected = "selected"
          @endif
          >{{ $category->name }}</option>
       </option>
    @empty
       <option value="0">Error: No Categories Found</option>
    @endforelse
  </select>
</div>
<br>
