<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeModel;
use App\Models\PointsModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EmployeeModel::class;
    public function definition(): array
    {
        return [
            'role' => $this->faker->randomElement([0, 1, 2]),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'middle_name' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'password' => Hash::make('password'),
            'applied_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'joined_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => 'active',
            'job_position' => $this->faker->randomElement(['HR Manager', 'Recruiter', 'Training Specialist', 'Compensation Analyst', 'Sales Representative', 'Marketing Manager', 'Digital Marketing Specialist', 'Brand Ambassador', 'Financial Controller', 'Accounts Payable Clerk', 'Financial Analyst', 'Tax Specialist', 'Operations Manager', 'Logistics Coordinator', 'Procurement Officer', 'Quality Assurance Specialist', 'IT Project Manager', 'Database Administrator', 'Software Engineer', 'Cybersecurity Analyst', 'Graphic Designer', 'Copywriter', 'UI/UX Designer', 'Art Director']),
            'job_type' => $this->faker->randomElement(['Pull-Time', 'Part-Time']),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'province_state' => $this->faker->state(),
            'street' => $this->faker->streetAddress(),
            'postal_id' => $this->faker->postcode(),
        ];
    }

        /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (EmployeeModel $employee) {
            $pointsModel = new PointsModel();
            $pointsModel->employee_id = $employee->id;
            $pointsModel->save();
        });
    }
}
