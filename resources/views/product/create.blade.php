<style>
input[type=text], textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 35%;
  background-color: #4CAF50;
  color: white;
  font-size: 18px;
  font-weight: bold;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.cancel {
      width: 35%;
      background-color: #4e4e4e;
      color: white;
      font-size: 18px;
      font-weight: bold;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  margin-top: 45px;
  width: 95%;
  margin-left: auto;
  margin-right: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<div class="container">

<h3>Add a new Product :</h3>

<div>
  <form action=" {{route('products.store')}} " method="POST">
    @csrf
    <label for="fname">Product Name</label>
    <input type="text" name="name" placeholder="Product name..">

    <label for="lname">Product Price</label>
    <input type="text" name="price" placeholder="Product price..">

    <label for="country">Description</label>
    <textarea placeholder="description.." name="detail"></textarea>
    <input type="submit" value="ADD">
</form>
<a href="{{route('products.index')}}"><button class="cancel">Cancel</button></a>
</div>
</div>
