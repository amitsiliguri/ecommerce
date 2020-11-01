<x-Frontend.Layouts.checkout-layout>
    
    <div class="border rounded" x-data>
        
        
        
        
        <div class="head bg-gray-100 flex px-2 py-2">
            <h3 class="text-2xl">Shipping Address</h3>
        </div>
        <div class="body px-2 py-2">
            <div class="inline-block relative ml-2">
                <select name="checkout_shipping_address" id="checkout_shipping_address" class="cursor-pointer block appearance-none w-full bg-white border hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                    <option disabled selected>Choose Shipping Address</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <span class="mdi mdi-chevron-down"></span>
                </div>
            </div>
        </div>




        <div class="head bg-gray-100 px-2 py-2">
            <h3 class="text-2xl">Shipping Methods</h3>
        </div>
        <div class="body px-2 py-2 flex">
            
            <table class="w-full">
                <colgroup>
                    <col class="w-12">
                    <col class="w-64">
                    <col class="w-24">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="px-2 py-2">
                            <input type="radio" name="checkout_shipping_method" id="checkout_shipping_method_fixed_rate">
                        </td>
                        <td class="px-2 py-2">
                            <label for="checkout_shipping_method_fixed_rate">Fixed rate</label>
                        </td>
                        <td class="px-2 py-2">
                            <label for="checkout_shipping_method_fixed_rate">10</label>
                        </td>
                        <td class="px-2 py-2"></td>
                    </tr>
                    <tr>
                        <td class="px-2 py-2">
                            <input type="radio" name="checkout_shipping_method" id="checkout_shipping_method_self_collect">
                        </td>
                        <td class="px-2 py-2">
                            <label for="checkout_shipping_method_self_collect">Self Collect</label>
                        </td>
                        <td class="px-2 py-2">
                            <label for="checkout_shipping_method_self_collect">0</label>
                        </td>
                        <td class="px-2 py-2">
                            <div class="inline-block relative w-full">
                                <select name="checkout_shipping_address" id="checkout_shipping_address" class="cursor-pointer block appearance-none w-full bg-white border hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                                    <option disabled selected>Pick Up Location</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <span class="mdi mdi-chevron-down"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>




        <div class="head bg-gray-100 px-2 py-2">
            <h3 class="text-2xl">Billing Address</h3>
        </div>
        <div class="body px-2 py-2">
            <table class="w-full">
                <colgroup>
                    <col class="w-12">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="px-2 py-2">
                            <input type="checkbox" name="checkout_same_shipping_billing_address" id="checkout_same_shipping_billing_address">
                        </td>
                        <td class="px-2 py-2">
                            <label for="checkout_same_shipping_billing_address">My Shipping and Billing Address are same</label>
                        </td>
                    </tr>
                </tbody>
            </table>



            <div class="inline-block relative my-2 mx-2">
                <select name="checkout_shipping_address" id="checkout_shipping_address" class="cursor-pointer block appearance-none w-full bg-white border hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                    <option disabled selected>Choose Billing Address</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <span class="mdi mdi-chevron-down"></span>
                </div>
            </div>


            
            
        </div>




        <div class="head bg-gray-100 px-2 py-2">
            <h3 class="text-2xl">Billing Methods</h3>
        </div>
        <div class="body px-2 py-2 flex">
            <table class="w-full">
                <colgroup>
                    <col class="w-12">
                    <col class="w-64">
                    <col class="w-24">
                    <col>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="px-2 py-2">
                            <input type="radio" name="checkout_billing_method" id="checkout_billing_method_fixed_rate">
                        </td>
                        <td class="px-2 py-2">
                            <label for="checkout_billing_method_fixed_rate">Cash on Delivery</label>
                        </td>
                        <td class="px-2 py-2">
                        </td>
                    </tr>

                    <tr>
                        <td class="px-2 py-2">
                            <input type="radio" name="checkout_billing_method" id="checkout_billing_method_purchase_order">
                        </td>
                        <td class="px-2 py-2">
                            <label for="checkout_billing_method_purchase_order">Purchase Order</label>
                        </td>
                        <td class="px-2 py-2"></td>
                    </tr>

                    <tr>
                        <td class="px-2 py-2">
                            <input type="radio" name="checkout_billing_method" id="checkout_billing_method_account_balance">
                        </td>
                        <td class="px-2 py-2">
                            <label for="checkout_billing_method_account_balance">Account Balance</label>
                        </td>
                        <td class="px-2 py-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
























    <x-slot name="checkoutSideBar">
        <div class="border rounded" x-data>
            <div class="head bg-gray-100 flex px-2 py-2">
                <h3 class="text-lg">Order Items</h3>
            </div>

            <table>
                <tbody>
                    <tr>
                        <td class="px-2 py-2"><img src="/asset/catalog/product/0/noImage.png" alt="product image" width="87px"></td>
                        <td class="px-2 py-2">
                            <h5>Product Title</h5>
                            <span class="text-sm">Qty : 10</span>, <span class="text-sm">Unit Price : ₹ 333</span> <br>
                            <span class="attribute_key text-sm">Color</span> : <span class="attribute_value text-sm">White</span>, 
                            <span class="attribute_key text-sm">Size</span> : <span class="attribute_value text-sm">XL</span>
                        </td>
                    </tr>
                </tbody>
            </table>



            <div class="head bg-gray-100 flex px-2 py-2">
                <h3 class="text-lg">Apply Coupon</h3>
            </div>
            <form action="#" method="post" class="w-full px-2 py-2">
                <div class="flex items-center border border-teal-400 rounded">
                    <input class="appearance-none bg-transparent border-none w-full text-gray-700 py-2 px-2 leading-tight focus:outline-none" type="text" placeholder="Coupon" aria-label="Coupon">
                    <input type="submit" value="Apply" class="bg-white flex-shrink-0 border-transparent text-teal-500 hover:text-teal-800 px-2 py-2 rounded focus:outline-none cursor-pointer">
                </div>
            </form>





            <div class="head bg-gray-100 flex px-2 py-2">
                <h3 class="text-lg">Shipping Address</h3>
            </div>
            <div class="w-full px-2 py-2">
                Amit Biswas <br>
                Biswas House BBD sarani Shanti Villa <br>
                Siliguri West Bengal India <br>
                734007 <br>
                9475585924 <br>
            </div>

            <div class="head bg-gray-100 flex px-2 py-2">
                <h3 class="text-lg">Shipping Method</h3>
            </div>

            <div class="w-full px-2 py-2">
                <span >Fixed rate</span>
            </div>

            <div class="head bg-gray-100 flex px-2 py-2">
                <h3 class="text-lg">Billing Address</h3>
            </div>

            <div class="w-full px-2 py-2">
                Amit Biswas <br>
                Biswas House BBD sarani Shanti Villa <br>
                Siliguri West Bengal India <br>
                734007 <br>
                9475585924 <br>
            </div>

            <div class="head bg-gray-100 flex px-2 py-2">
                <h3 class="text-lg">Billing Method</h3>
            </div>

            <div class="w-full px-2 py-2">
                <span>Cash on Delivery</span>
            </div>





            <div class="head bg-gray-100 flex px-2 py-2">
                <h3 class="text-lg">Order Summary</h3>
            </div>

            <table class="w-full">
                <tbody>
                    <tr>
                        <td class="px-2 py-1">
                            Cart Total 
                        </td>
                        <td class="px-2 py-1 text-right">
                            ₹ 999
                        </td>
                    </tr>
                    <tr>
                        <td class="px-2 py-1">
                            Discount 
                        </td>
                        <td class="px-2 py-1 text-right">
                            ₹ 111
                        </td>
                    </tr>
                    <tr>
                        <td class="px-2 py-1">
                            Shipping Rate 
                        </td>
                        <td class="px-2 py-1 text-right">
                            ₹ 10
                        </td>
                    </tr>
                    <tr>
                        <td class="px-2 py-1">
                            Tax 
                        </td>
                        <td class="px-2 py-1 text-right">
                            ₹ 10
                        </td>
                    </tr>
                    <tr>
                        <td class="px-2 py-1 font-medium">
                            Order Total 
                        </td>
                        <td class="px-2 py-1 text-right font-medium">
                            ₹ 908
                        </td>
                    </tr>
                </tbody>
            </table>

            <button class="w-full px-2 py-2 mt-2 bg-gray-100 hover:bg-gray-200">
                Place Order
            </button>
        </div>
    </x-slot>

</x-Frontend.Layouts.checkout-layout>