<form wire:submit.prevent='calculate'>
    <h3>Calculate BMI</h3>
    <div class="field-row-stacked" style="width: 200px">
        <label for="text27">Height (CM)</label>
        <input id="text27" type="number" name="height" wire:model.lazy='height' />
        @error('height')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="field-row-stacked" style="width: 200px">
        <label for="text28">Weight (KG)</label>
        <input id="text28" type="number" name="weight" wire:model.lazy='weight' />
        @error('weight')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="field-row-stacked mt-2 " style="width: 200px">
        <button type="submit">Find My BMI</button>
        <button type="button" wire:click="resetForm">Reset</button>
    </div>
    @if ($bmi_category)
        <div role="tooltip">
            <h4>Category: {{$bmi_category}}</h4>
            <h4>Health Rish: {{$health_risk}}</h4>
            <h4>Suggestion: {{$suggestion}}</h4>
        </div>
    @endif
</form>
