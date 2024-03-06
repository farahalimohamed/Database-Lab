import React, { useCallback, useState } from 'react';
import axios from 'axios'
const AddProducts = () => {
    let [Prd,setPrd] = useState({
        name:'',
        price:0,
        quantity:0,
        imgUrl:'https://source.unsplash.com/random'
    });
    let HandleChange =useCallback((e)=>{
        console.log(e)
        const {name,value} = e.target;
        setPrd((old)=>({
            ...old,
            [name] : value
        }))
    })
    let AddPrd = (e)=>{
        e.preventDefault();
        axios.post("http://localhost:2000/products",Prd)
        .then(res=>{
            console.log(res.data)
            setPrd(res.data)
        })
        .catch(err=>console.log(err))
    }
    return (
        <div class="m-5">
            <h1>Add New Product</h1>
            <form action="" onSubmit={AddPrd}>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name" value={Prd.name} onChange={HandleChange}/>
                    <label for="floatingInput">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Image" name="imgUrl" value={Prd.imgUrl} onChange={HandleChange}/>
                    <label for="floatingInput">Product Image</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="Price" name="price" value={Prd.price} onChange={HandleChange}/>
                    <label for="floatingInput">Product Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="Quantity" name="quantity" value={Prd.quantity} onChange={HandleChange}/>
                    <label for="floatingInput">Product Quantity</label>
                </div>
                <button className="btn btn-dark">Submit</button>
            </form>

        </div>
    );
};

export default AddProducts;