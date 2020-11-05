<div class="head bg-gray-100 flex px-2 py-2">
    <h3 class="text-lg">Billing Method</h3>
</div>


<div class="w-full px-2 py-2">
    <template x-if="selected_billing_method">
        <span x-text="selected_billing_method.label"></span>
        <div>
            <template x-if="selected_billing_method.code == 'account_credit'">
                <p>Available credit limit : </p>
            </template>
            <template x-if="selected_billing_method.code == 'account_balance'">
                <p>Available account balance : </p>
            </template>
        </div>
    </template>
    <template x-if="!selected_billing_method">
        <span>Billing Method not selected</span>
    </template>
</div>



