<template>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-2">
      <a href="javascript:;" class="btn btn-primary" @click="uploadImage()">上传图片</a>
      <input type="file" id="file-btn" class="hidden">
    </div>
    <div class="col-sm-4">
      <div class="preview-image"></div>
    </div>
  </div>
</template>
<style>

</style>
<script>
    export default {
      mounted: function(){
        let that = this;
        $('#file-btn').change(function(){
          let imageObject = $(this)[0].files[0];
          if(imageObject != undefined)
          {
            let fd = new FormData();
            fd.append('uploadFile', imageObject);
            $.ajax({
              url: '/admin/upload',
              type:"post",
              data: fd,
              headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              },
              cache: false,
              contentType: false,
              processData: false,
              success:function(data){
                console.log(data)
                let img = '<img src="'+ data+'" style="width:100%;"/>';
                $('.preview-image').html(img);
                $('#file-btn')[0].files = undefined;
                that.$emit('update:imageUrl', data);
              }
          });
          }
        })
      },
      data: function(){
        return {
          test: null,
        }
      },
      props: ['imageUrl'],
      methods: {
        uploadImage: function(){
          $('#file-btn').click();
        }
      }
    }
</script>