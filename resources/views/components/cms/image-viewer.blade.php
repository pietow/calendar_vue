<div x-data="imageViewer()" x-init="imageUrl = '{{asset("../storage/images/".$path)}}'">
  <div class="mb-2">
    <!-- Show the image -->
      <img :src="imageUrl" 
           class="object-cover rounded border border-gray-200" 
           style="width: 100px; height: 100px;"
      >
    <!-- Image file selector -->
    <input class="mt-2" type="file" name="{{$name}}" id="{{$name}}" @change="fileChosen">
    
  </div>
</div>

<script>
function imageViewer(){
  return{
    imageUrl:"",
      fileChosen(event) {
          if(!event.target.files[0]) return

          let file = event.target.files[0];
          let reader = new FileReader();
          reader.readAsDataURL(file)
          reader.onload = () => this.imageUrl = reader.result
        }
  }
}
</script>
