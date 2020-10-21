<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="example">
	<button v-on:click="handlePayButton">Bayar</button>

</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-aZ-g1zLe7E-zMCB0"></script>
<script type="text/javascript">
	
	var vm=new Vue({
		el:'#example',
		data:function(){
			return{
				data_midtrans:{
				'transaction_details':{

					'order_id':"order-124345678",
					'gross_amount':50000
				},
				'customer_details':{
					'first_name':'Regi',
					'last_name':'Anugrah',
					'email':'sasas@gmail.com',
					'phone':'090239238293829'
					}
				}
			}
		},
		methods:{
			handlePayButton:function(event){
				
				this.$http.post('/api/generate',{
					data:this.data_midtrans
				}).then(response=>{
					// console.log(response.data)
					snap.pay(response.data.data.token);
				},response=>{
					console.log('error:'+response)
				})
			}
		}


	})
</script>
</body>
</html>