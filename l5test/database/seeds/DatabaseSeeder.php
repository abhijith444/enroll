<?php 
use App\Section;
use App\Course;
use App\User;
use App\Enrollment;


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('UserSeeder');
		$this->call('CourseSeeder');
		$this->call('SectionSeeder');
        $this->call('EnrollmentSeeder');

        
	}

}

class UserSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
       
        User::create([
            'id' => 1,
            'student_id' => "700626229",
            'name' => "Abhijith Setty",
            'email' => "abhijth8@gmail.com",
            'password' => bcrypt("123456"),

            ]);

        User::create([
            'id' => 2,
            'student_id' => "700621234",
            'name' => "Praneeth Prasad",
            'email' => "praneeth531@gmail.com",
            'password' => bcrypt("123456"),
            ]);
    }

}

class CourseSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        Course::create([
        	'course_code' => 5660,
        	'course_name' => "Legal",
        	'course_type' => "Core",
        	'description' => "This is a core Course",
        	]);

        Course::create([
        	'course_code' => 4665,
        	'course_name' => "JAVA",
        	'course_type' => "Track",
        	'description' => "This is a Track Course",
        	]);
    }

}

class SectionSeeder extends Seeder {

    public function run()
    {
        DB::table('sections')->delete();

        Section::create([
        	'crn' => 124578,
        	'course_id' => 1,
            'instructor'=>"Kamal",
        	'time' => "1:00 pm - 4:00 pm",
            'days' => "M",
            'time_code' => 1,
        	'capacity' => 30,
        	'description' => "Course 1 Section",
            'location'=>'Warrensburg',
        	]);
        Section::create([
        	'crn' => 789456,
        	'course_id' => 1,
            'instructor'=>"Faja",
        	'time' => "1:00 pm - 4:00 pm",
        	'days' => "T",
            'time_code' => 1,
        	'capacity' => 30,
        	'description' => "Course 1 Section",
            'location'=>'Warrensburg',
        	]);
        Section::create([
        	'crn' => 456785,
        	'course_id' => 1,
            'instructor'=>"Narsimham",
        	'time' => "1:00 pm - 4:00 pm",
        	'days' => "W",
            'time_code' => 1,
        	'capacity' => 30,
        	'description' => "Course 1 Section",
            'location'=>'Warrensburg',
        	]);

        Section::create([
        	'crn' => 415263,
        	'course_id' => 2,
            'instructor'=>"Sam",
        	'time' => "1:00 pm - 4:00 pm",
        	'days' => "W",
            'time_code' => 1,
        	'capacity' => 30,
        	'description' => "Course 2 Section",
            'location'=>'Warrensburg',
        	]);
        Section::create([
        	'crn' => 458741,
        	'course_id' => 2,
            'instructor'=>"Blake",
        	'time' => "6:00 pm - 9:00 pm",
        	'days' => "F",
            'time_code' => 1,
        	'capacity' => 30,
        	'description' => "Course 2 Section",
            'location'=>'Warrensburg',
        	]);
        Section::create([
        	'crn' => 968574,
        	'course_id' => 2,
            'instructor'=>"Prasad",
        	'time' => "9:00 am - 11:00 am",
        	'days' => "S",
            'time_code' => 1,
        	'capacity' => 30,
        	'description' => "Course 2 Section",
            'location'=>'Warrensburg',
        	]);
<<<<<<< HEAD
        Section::create([
            'crn' => 231231,
            'course_id' => 3,
            'instructor'=>"Abhijith",
            'time' => "9:00 am - 11:00 am",
            'days' => "M",
            'time_code' => 1,
            'capacity' => 30,
            'description' => "Course 2 Section",
            'location'=>'Warrensburg',
            ]);
        Section::create([
            'crn' => 543235,
            'course_id' => 3,
            'instructor'=>"Abhijith",
            'time' => "9:00 am - 11:00 am",
            'days' => "T",
            'time_code' => 1,
            'capacity' => 30,
            'description' => "Course 2 Section",
            'location'=>'Warrensburg',
            ]);
        Section::create([
            'crn' => 876534,
            'course_id' => 3,
            'instructor'=>"Abhijith",
            'time' => "9:00 am - 11:00 am",
            'days' => "W",
            'time_code' => 1,
            'capacity' => 30,
            'description' => "Course 2 Section",
            'location'=>'Warrensburg',
            ]);
=======
>>>>>>> e458413606684aa1d1b5b8461ad5ef987be59ca2
    }
}

class EnrollmentSeeder extends Seeder {

    public function run()
    {
        DB::table('enrollments')->delete();

        Enrollment::create([
            'student_id' => 1,
            'section_id' => 3,
            ]);
            
        Enrollment::create([
            'student_id' => 1,
            'section_id' => 4,
            ]);
    }

}
