
#  CSS for child with parent class

.content{
    margin-left: 270px;
    margin-top: 100px;
    width:80%;
    border: 1px solid black;
    }

    .content .child{
        width: 400px;
        height: 400px;
        margin: 100px auto;
        border: 1px solid black;
        background: #fff;
        position: relative;
    }

   # ======================================================== # 

  # HTML for contain with child parent relationship 
  # I can use content class withot  child 
 
     <!-- div class is name content -->
<div class="content">
<div class="child">

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>

</div>
</div>

# ======================================================== #