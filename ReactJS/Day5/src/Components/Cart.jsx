import React, { Component } from 'react'
import { connect } from "react-redux";
import {IncreaseQuantity,DecreaseQuantity,DeleteCart} from '../Actions';

function Cart({items,IncreaseQuantity,DecreaseQuantity,DeleteCart}){
  //  console.log(items)
    let ListCart = [];
    let TotalCart=0;
    Object.keys(items.Carts).forEach(function(item){
        TotalCart+=items.Carts[item].quantity * items.Carts[item].price;
        ListCart.push(items.Carts[item]);
    });
    function TotalPrice(price,tonggia){
        return Number(price * tonggia).toLocaleString('en-US');
    }
    
    
    return(
        <div className="row">
            <div className="col-md-12">
            <table className="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                {
                    ListCart.map((item,key)=>{
                        return(
                            <tr key={key}>    
                            <td>
                                <svg onClick={()=>DeleteCart(key)} xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" className="bi bi-trash3 text-danger ms-4" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </td>
                            <td>{item.name}</td>
                            <td><img src={item.imgUrl} style={{width:'100px',height:'80px'}}/></td>
                            <td>{item.price}</td>
                            <td>
                                    <span className="btn btn-primary" style={{margin:'2px'}} onClick={()=>DecreaseQuantity(key)}>-</span>
                                    <span className="btn btn-info">{item.quantity}</span>
                                    <span className="btn btn-primary" style={{margin:'2px'}} onClick={()=>IncreaseQuantity(key)}>+</span>
                            </td>
                            <td>{ TotalPrice(item.price,item.quantity)} $</td>
                        </tr>
                        )
                    })
                        
                }
                <tr>
                    <td colSpan="5">Total Carts</td>
                    <td>{Number(TotalCart).toLocaleString('en-US')} $</td>
                </tr>
                </tbody>
              
            </table>
            </div>
        </div>
    )
}
const mapStateToProps = state =>{
  //  console.log(state)
    return{
        items:state._todoProduct
    }
}

export default connect(mapStateToProps,{IncreaseQuantity,DecreaseQuantity,DeleteCart})(Cart)
