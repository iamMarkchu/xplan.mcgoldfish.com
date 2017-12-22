<template>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="menu-text">添加商家</span></h3>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" id="addMerchantForm">
            <div :class="['form-group', hasError(errorData.name)]">
              <label for="name" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Name" name="name" v-model="merchant.name">
                <p class="help-block">
                  <template v-for="item in errorData.name">
                    {{ item }}
                  </template>
                </p>
              </div>
            </div>
            <div class="form-group hidden">
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Image" name="image_url" v-model="merchant.image_url" readonly="readonly">
                <p class="help-block"></p>
              </div>
            </div>
            <upload-component :imageUrl.sync="merchant.image_url"></upload-component>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Country</label>
              <div class="col-sm-6">
                <select name="country" class="form-control" v-model="merchant.country">
                  <option :value="item.value" v-for="item in countryData">{{ item.name }}</option>
                </select>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="has_aff" class="col-sm-2 control-label">Has AFF</label>
              <div class="col-sm-6">
                <select name="has_aff" class="form-control" v-model="merchant.has_aff">
                  <option value="no">NO</option>
                  <option value="yes">YES</option>
                </select>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="status" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-6">
                <select name="status" class="form-control" v-model="merchant.status">
                  <option value="active">ACTIVE</option>
                  <option value="deleted">DELETED</option>
                </select>
                <p class="help-block"></p>
              </div>
            </div>
            <div :class="['form-group', hasError(errorData.dst_url)]">
              <label for="dst_url" class="col-sm-2 control-label">Desination Url</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Desination Url" name="dst_url" v-model="merchant.dst_url">
                <p class="help-block">
                  <template v-for="item in errorData.dst_url">
                    {{ item }}
                  </template>
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="url_name" class="col-sm-2 control-label">Url Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Url Name" name="url_name" v-model="merchant.url_name">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Facebook Url</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Facebook Url" name="facebook_url" v-model="merchant.facebook_url">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Important Order</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="Important Order" name="important_order" v-model="merchant.important_order">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-8">
                <textarea name="description" cols="30" rows="10" class="form-control" v-model="merchant.description"></textarea>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <a href="javascript:;" class="btn btn-success" @click="handleSubmit()">提交</a>
                <a href="javascript:;" class="btn btn-default" @click="handleCancel()">取消</a>
              </div>
            </div>
          </form>
        </div>
    </div>
</template>
<style>
  table th,table td{
    text-align: center;
  }
</style>
<script>
  let _ = require('lodash')
  export default {
    mounted: function(){

    },
    data: function(){
      return {
        merchant: {
          name: 'nike',
          image_url: '/storage/image/qfeCdwzihw6MPvegxYfoQ2OTtX3Z4Gt4bHU9fu79.png',
          country: 'UK',
          has_aff: 'yes',
          status: 'active',
          dst_url: 'https://www.baidu.com',
          url_name: 'baidu.com',
          facebook_url: 'https://www.facebook.com/nike.com',
          important_order: 99,
          description: '123123123'
        },
        errorData: {
          name: '',
          dst_url: '',
          url_name: '',
          facebook_url: '',
          important_order: '',
        },
        countryData: [
          {
            name: 'US',
            value: 'US',
          },
          {
            name: 'UK',
            value: 'UK',
          },
          {
            name: 'CA',
            value: 'CA',
          },
          {
            name: 'AU',
            value: 'AU',
          },
        ],
      }
    },
    methods: {
      checkName: _.debounce(
        function(){
          console.log(this.merchant.name);
        },
        500),
      handleCancel: function(){
        this.$router.go(-1);
      },
      handleSubmit: function(){
        let formData = this.merchant;
        let that = this;
        that.errorData = {
          name: '',
          dst_url: '',
          url_name: '',
          facebook_url: '',
          important_order: '',
        };
        axios.post('/merchant',
          formData)
          .then(function(response){
            if(response.data.message == 'success')
            {
              alert('success');
              that.$router.go(-1);
            }
          })
          .catch(function (error) {
            if(error.response)
            {
              _.forEach(that.errorData, function(n, k){
                _.forEach(error.response.data.errors, function(nn, kk){
                  if(k == kk)
                  {
                    that.errorData[k] = nn;
                  }
                });
              });
              alert('has error');
            }
          });
      },
      hasError: function(errors)
      {
        if(errors.length > 0)
        {
          return 'has-error';
        }else{
          return '';
        }
      }
    },
    watch: {
      'merchant.name': function(newName){
        this.checkName();
      }
    },
    components: {
      'upload-component': require('../../components/Upload.vue')
    }
  }
</script>