<form action="{{route('user.dashboard.accounts.bankAccount.update', $account->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="bankAccountName">{{ __('Bank Account Name') }}:</label>
            <input type="text" id="bankAccountName" name="bank_account[name]" class="form-control @error('bank_account[name]') is-invalid @enderror" value="{{ old('bank_account[name]', $account->bankAccount->name) }}">
            @error('bank_account[name]')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="bankAccountBankName">{{ __('Bank Name') }}:</label>
            <input type="text" id="bankAccountBankName" name="bank_account[bank_name]" class="form-control @error('name') is-invalid @enderror" value="{{ old('bank_account[bank_name]', $account->bankAccount->bank_name) }}">
            @error('bank_account[bank_name]')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="bankAccountCountry">{{ __('Bank Account Country') }}:</label>
            <select name="bank_account[country_id]" id="bankAccountCountry" class="form-select">
                <option value="">{{ __('Select Country') }}</option>
                @foreach (\App\Models\Country::all() as $country)
                <option value="{{ $country->id }}" {{ old('bank_account[country_id]', $account->bankAccount->country_id) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
            @error('bank_account[country_id]')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="bankAccountBankCurrency">{{ __('Select Currency') }}:</label>
            <select name="bank_account[currency_id]" id="bankAccountBankCurrency" class="form-select">
                <option value="">{{ __('Select Currency') }}</option>
                @foreach (\App\Models\Currency::all() as $currency)
                <option value="{{ $currency->id }}" {{ old('bank_account[currency_id]', $account->bankAccount->currency_id) == $currency->id ? 'selected' : '' }}>{{ $currency->name }}</option>
                @endforeach
            </select>
            @error('bank_account[currency_id]')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="bankAccountIbanNumber">{{ __('IBAN Number') }}:</label>
            <input type="text" id="bankAccountIbanNumber" name="bank_account[iban_number]" class="form-control @error('name') is-invalid @enderror" value="{{ old('bank_account[iban_number]', $account->bankAccount->iban_number) }}">
            @error('bank_account[iban_number]')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="bankAccountNumber">{{ __('Account Number') }}:</label>
            <input type="text" id="bankAccountNumber" name="bank_account[number]" class="form-control @error('name') is-invalid @enderror" value="{{ old('bank_account[number]', $account->bankAccount->number) }}">
            @error('bank_account[number]')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="bankAccountSoftCode">{{ __('Soft Code') }}:</label>
            <input type="text" id="bankAccountSoftCode" name="bank_account[soft_code]" class="form-control @error('name') is-invalid @enderror" value="{{ old('bank_account[soft_code]', $account->bankAccount->soft_code) }}">
            @error('bank_account[soft_code]')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="bankAccountBankAddress">{{ __('Bank Address') }}:</label>
            <input type="text" id="bankAccountBankAddress" name="bank_account[bank_address]" class="form-control @error('name') is-invalid @enderror" value="{{ old('bank_account[bank_address]', $account->bankAccount->bank_address) }}">
            @error('bank_account[bank_address]')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="text-end mt-4">
        <button class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</form>