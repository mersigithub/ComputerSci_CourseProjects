import { Form, Button, Table } from "react-bootstrap";
import { useState } from 'react';

export default function AddProduct(){
    // method to add product
    let initialValue = [];
    const [products, setProduct] = useState(initialValue);
    

    const add = (event)=>{
        event.preventDefault();
        const formData = event.target;
        
        const newProduct = {
            product_name: formData.product_name.value,
            qty: Number(formData.qty.value)
        }
        setProduct([...products, newProduct]);

    }
    const incrQuantity = (event)=>{
        const indexOfArray = event.target.value;
        products[indexOfArray].qty = products[indexOfArray].qty + 1;
        setProduct([...products])
    }
    const decrQuantity = (event)=>{
        const indexOfArray = event.target.value;
        products[indexOfArray].qty = products[indexOfArray].qty - 1;
        setProduct([...products])
        
    }
    return(
        <div>
            <Form onSubmit = {add}>
                <Form.Group className="mb-3" controlId="Product Name">
                    <Form.Label>Product Name</Form.Label>
                    <Form.Control type="text" placeholder="Enter Product Name" name="product_name" />
                </Form.Group>

                <Form.Group controlId="formBasicQty">
                    <Form.Label>Quantity</Form.Label>
                    <Form.Control type="number" placeholder="Enter Quantity" name="qty" />
                </Form.Group>
                <h1>

                </h1>
                
                <Button variant="primary" type="submit">
                    Add to Inventory 
                </Button>
            </Form>
            <h5>

            </h5>
            <Table striped bordered hover variant="light">
            <thead>
                <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Inc/Dec</th>
                </tr>
            </thead>

            <tbody>
                {
                    products.map((item, index)=>{
                        return(
                        <tr>
                            <td>{index}</td>
                            <td>{item.product_name}</td>
                            <td>{item.qty}</td>     
                            <td>
                                <Button variant="success" onClick={event=>incrQuantity(event)} value={index}>+</Button>
                                <Button variant="danger" onClick={event=>decrQuantity(event)} value={index}>-</Button>
                            </td> 
                        </tr>
                        )
                    })
                }
            </tbody>
            </Table>

            <form>
                <label for="exampleInputEmail1">Email us if the product hits zero</label>
                <h1>Email</h1>
                    <Form.Control type="text" placeholder="Enter email: inventory@example.com" name="product_name"/>
                <h3>

                </h3>
                    <textarea name="message" id="message" placeholder="Type message here"className="message_box"/>
                <h2>

                </h2>
                <button type="submit" class="btn btn-primary">
                    Send
                </button>
            
            </form>

        </div>
        
    )
}