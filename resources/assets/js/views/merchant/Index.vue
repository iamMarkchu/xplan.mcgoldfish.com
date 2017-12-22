<template>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="menu-text">商家管理</span></h3>
        </div>
        <div class="panel-body query-form">
          <form class="form-inline">
            <router-link class="btn btn-success" to="/merchant/add">添加商家</router-link>
          </form>
        </div>
        <el-button @click="visible = true">按钮</el-button>
<!--         <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Country</th>
              <th>Has Aff</th>
              <th>Status</th>
              <th>Desination Url</th>
              <th>Facebook Url</th>
              <th>Order</th>
              <th>User</th>
              <th>Created</th>
              <th>Updated</th>
              <th>Operation</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="merchant in merchants">
              <td>{{ merchant.id }}</td>
              <td>{{ merchant.name }}</td>
              <td>{{ merchant.country }}</td>
              <td>{{ merchant.has_aff }}</td>
              <td>{{ merchant.status }}</td>
              <td>{{ merchant.dst_url }}</td>
              <td>{{ merchant.facebook_url }}</td>
              <td>{{ merchant.important_order }}</td>
              <td>{{ merchant.user_id }}</td>
              <td>{{ merchant.created_at }}</td>
              <td>{{ merchant.updated_at }}</td>
              <td>
                <a href="javascript:;">[Edit]</a>
                <a href="javascript:;">[Add Promo]</a>
              </td>
            </tr>
          </tbody>
        </table>
 -->    </div>
</template>
<style>
  table th,table td{
    text-align: center;
  }
</style>
<script>
  export default {
    created: function(){
      this.addMerchant();
    },
    data: function(){
      return {
        merchants: null,
      }
    },
    methods: {
      addMerchant: function(){
        let that = this;
        axios.get('/merchant')
          .then(function(response){
            that.merchants = response.data.data;
          })
          .catch(function(error){
            console.log(error);
          })
      }
    }
  }
</script>