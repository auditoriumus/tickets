<?php

namespace App\Http\Requests;

use App\Services\Tickets\Buildings\BuildingTicket;
use App\Services\Tickets\Dictionaries\DealDict;
use App\Services\Tickets\Dictionaries\FunctionalTypeDict;
use App\Services\Tickets\Dictionaries\SellerDict;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class CreateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     * @throws Exception
     */
    public function rules(): array
    {
        return match (request()->input('functional_type')) {
            mb_strtolower((FunctionalTypeDict::COMMERCIAL)->name) => $this->getCommercialBuildingRules(),
            mb_strtolower((FunctionalTypeDict::LIFE)->name)       => $this->getLifeBuildingRules(),
            default                                               => throw new Exception('Unsupported ticket functional type', 422),
        };
    }

    public function messages(): array
    {
        return [
            'title.required' => '',
        ];
    }

    private function getCommercialBuildingRules(): array
    {
        $rules = $this->getBuildingRules();
        return $rules;
    }

    private function getLifeBuildingRules(): array
    {
        $rules = $this->getBuildingRules();
        return $rules;
    }

    private function getBuildingRules(): array
    {
        return [
            'title'             => ['required', 'string'],
            'description'       => ['required', 'string'],
            'price'             => ['required', 'numeric', 'min:0'],
            'deal'              => ['required', 'in:' . implode(',', DealDict::valuesToLowerCase())],
            'functional_type'   => ['required', 'in:' . implode(',', FunctionalTypeDict::valuesToLowerCase())],
            'share'             => ['numeric', 'nullable', 'min:0,1', 'max:1'],
            'total_area'        => ['required', 'numeric', 'min:0,1'],
            'seller'            => ['required', 'in:' . implode(',', SellerDict::valuesToLowerCase())],
            'year'              => ['required', 'numeric', 'min:1850', 'max:2050'],
            'height'            => ['required', 'numeric', 'min:1'],
            'lifts'             => ['in_array:' . implode(',', [BuildingTicket::PASSENGER_LIFT, BuildingTicket::SERVICE_LIFT])],
        ];
    }
}
