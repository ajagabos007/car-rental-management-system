<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\AssignPermissionRule;
use App\Rules\AssignUserRule;

class StoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $assign_permission_rule = new AssignPermissionRule;
        $assign_user_rule = new AssignUserRule;

        return array_merge([
            'name' => 'required|'.Rule::unique('roles','name')->ignore($this->role, 'id')
        ],array_merge($assign_user_rule::$validation_rules, $assign_permission_rule::$validation_rules));
    }
}
