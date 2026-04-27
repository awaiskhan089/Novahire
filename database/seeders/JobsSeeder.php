<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\JobListing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    public function run(): void
    {
        // Get or create TestCo company
        $company = Company::firstOrCreate(
            ['slug' => 'testco'],
            [
                'name' => 'TestCo',
                'email' => 'contact@testco.dev',
                'plan' => 'pro',
                'status' => 'active',
            ]
        );

        // Get HR Admin user (typically creates job listings)
        $creator = User::where('email', 'hr@test.com')->first() ?? 
                   User::where('role_type', 'hr_admin')->first() ??
                   User::first();

        if (!$creator) {
            $this->command->warn('No user found to create jobs. Please run TestUsersSeeder first.');
            return;
        }

        $jobs = [
            [
                'title' => 'Senior Full Stack Developer',
                'department' => 'Engineering',
                'experience_level' => 'Senior',
                'location' => 'London, United Kingdom',
                'location_city' => 'London',
                'location_region' => 'England',
                'location_country_code' => 'GB',
                'location_label' => 'London, UK',
                'location_latitude' => 51.5074,
                'location_longitude' => -0.1278,
                'location_type' => 'hybrid',
                'job_type' => 'full_time',
                'salary_min' => 70000,
                'salary_max' => 95000,
                'salary_currency' => 'GBP',
                'salary_visible' => true,
                'vacancies' => 2,
                'description' => <<<'DESCRIPTION'
We are looking for an experienced Full Stack Developer to join our growing Engineering team at TestCo. 
You will be responsible for designing, developing, and maintaining scalable web applications using modern technologies.

About the Role:
- Develop and maintain both frontend and backend components of our AI recruitment platform
- Collaborate with product managers and designers to implement new features
- Participate in code reviews and contribute to our development best practices
- Optimize application performance and scalability
- Mentor junior developers and contribute to team growth

What We're Looking For:
- 7+ years of software development experience
- Strong proficiency in PHP/Laravel and JavaScript/Vue.js or React
- Experience with RESTful APIs and microservices architecture
- Solid understanding of database design and optimization
- Experience with Docker and cloud deployment (AWS/GCP/Azure)
DESCRIPTION,
                'requirements' => <<<'REQUIREMENTS'
Essential Requirements:
- Bachelor's degree in Computer Science or equivalent professional experience
- Proven experience with Laravel framework (3+ years)
- Expert-level JavaScript/TypeScript skills
- Experience with relational databases (PostgreSQL/MySQL)
- Version control proficiency (Git)
- Strong problem-solving skills and ability to work in agile environments

Desirable Skills:
- Experience with machine learning and AI integration
- Knowledge of recruitment/HR domain
- Experience with WebRTC or real-time communication
- Understanding of security best practices
- Previous experience with SaaS products
REQUIREMENTS,
                'benefits' => <<<'BENEFITS'
We Offer:
- Competitive salary range: £70,000 - £95,000 per annum
- Flexible working arrangements (3 days in office, 2 remote)
- Comprehensive health insurance (medical, dental, vision)
- Generous pension scheme (up to 5% employer contribution)
- Professional development budget (£3,000/year)
- Free gym membership
- Enhanced parental leave
- Annual bonus (up to 15% based on performance)
- Technology budget for home setup
- Inclusive and diverse workplace culture
BENEFITS,
            ],
            [
                'title' => 'Human Resources Manager',
                'department' => 'Human Resources',
                'experience_level' => 'Mid-Level',
                'location' => 'Manchester, United Kingdom',
                'location_city' => 'Manchester',
                'location_region' => 'Greater Manchester',
                'location_country_code' => 'GB',
                'location_label' => 'Manchester, UK',
                'location_latitude' => 53.4808,
                'location_longitude' => -2.2426,
                'location_type' => 'onsite',
                'job_type' => 'full_time',
                'salary_min' => 38000,
                'salary_max' => 52000,
                'salary_currency' => 'GBP',
                'salary_visible' => true,
                'vacancies' => 1,
                'description' => <<<'DESCRIPTION'
Join TestCo's HR team as a Human Resources Manager to lead talent acquisition and employee development initiatives.

About the Role:
- Lead recruitment efforts and manage the full hiring lifecycle
- Develop and implement HR policies and procedures
- Manage employee relations and conduct performance reviews
- Oversee training and development programs
- Maintain compliance with employment law and regulations
- Partner with hiring managers to identify talent needs
- Ensure positive employee engagement and workplace culture

Key Responsibilities:
- Post job openings and screen candidates
- Conduct interviews and prepare hiring recommendations
- Onboard new employees and create effective integration plans
- Track KPIs for recruitment and retention
- Plan and execute company events and team-building activities
- Manage employee records and HR documentation
DESCRIPTION,
                'requirements' => <<<'REQUIREMENTS'
Essential Requirements:
- 3-5 years of HR management experience
- CIPD Level 3 or equivalent qualification (preferred)
- Knowledge of UK employment law and ACAS guidelines
- Strong knowledge of recruitment best practices
- Experience with HR systems and HRIS platforms
- Excellent communication and interpersonal skills
- Strong organizational and time management abilities

Desirable Experience:
- Background in tech or SaaS recruitment
- Experience with AI-driven recruitment tools
- Knowledge of diversity and inclusion best practices
- Previous exposure to performance management systems
REQUIREMENTS,
                'benefits' => <<<'BENEFITS'
We Offer:
- Competitive salary: £38,000 - £52,000 per annum
- Flexible hybrid working (2-3 days in office)
- Comprehensive health and wellness package
- Pension scheme (4% employer contribution)
- 28 days annual leave plus bank holidays
- Professional development and training allowance
- Employee Assistance Programme (EAP)
- Subsidized gym membership
- Quarterly team outings
- Career progression opportunities
BENEFITS,
            ],
            [
                'title' => 'AI/ML Engineer - Recruitment Solutions',
                'department' => 'Engineering',
                'experience_level' => 'Senior',
                'location' => 'London, United Kingdom',
                'location_city' => 'London',
                'location_region' => 'England',
                'location_country_code' => 'GB',
                'location_label' => 'London, UK',
                'location_latitude' => 51.5074,
                'location_longitude' => -0.1278,
                'location_type' => 'remote',
                'job_type' => 'full_time',
                'salary_min' => 80000,
                'salary_max' => 130000,
                'salary_currency' => 'GBP',
                'salary_visible' => true,
                'vacancies' => 1,
                'description' => <<<'DESCRIPTION'
Revolutionize recruitment with AI! We're seeking an experienced AI/ML Engineer to lead the development 
of machine learning models and algorithms that power our intelligent recruitment platform.

About the Role:
- Design and implement machine learning models for candidate matching
- Develop algorithms for resume parsing and skill extraction
- Build predictive models for candidate success probability
- Optimize model performance and improve accuracy metrics
- Collaborate with engineering and product teams
- Deploy and monitor ML models in production
- Research emerging AI technologies and best practices

Key Contributions:
- Create intelligent candidate-job matching algorithms
- Develop bias detection and mitigation strategies
- Build recommendation systems for personalized job suggestions
- Implement natural language processing for job analysis
- Establish ML best practices and coding standards
DESCRIPTION,
                'requirements' => <<<'REQUIREMENTS'
Essential Requirements:
- 5+ years of machine learning and AI development experience
- Strong expertise in Python and deep learning frameworks (TensorFlow/PyTorch)
- Experience with NLP and computer vision projects
- Knowledge of MLOps, model deployment, and monitoring
- Strong statistical and mathematical foundation
- Experience with cloud platforms (AWS/GCP/Azure)
- Solid software engineering practices

Desirable Experience:
- HR/Recruitment domain knowledge
- Experience with Apache Spark or big data technologies
- Knowledge of reinforcement learning
- Published research or contributions to open-source ML projects
- Experience with model interpretability and explainability
REQUIREMENTS,
                'benefits' => <<<'BENEFITS'
We Offer:
- Excellent salary package: £80,000 - £130,000 per annum
- 100% remote working opportunity
- Comprehensive health, dental, and vision insurance
- Enhanced pension scheme (6% employer contribution)
- Professional development budget (£5,000/year)
- Conference attendance support
- Stock options/equity incentives
- Flexible working hours
- Annual performance bonus (up to 20%)
- Cutting-edge technology and tools
BENEFITS,
            ],
            [
                'title' => 'Recruitment Consultant',
                'department' => 'Sales & Recruitment',
                'experience_level' => 'Entry-Level',
                'location' => 'Bristol, United Kingdom',
                'location_city' => 'Bristol',
                'location_region' => 'Bristol',
                'location_country_code' => 'GB',
                'location_label' => 'Bristol, UK',
                'location_latitude' => 51.4545,
                'location_longitude' => -2.5879,
                'location_type' => 'hybrid',
                'job_type' => 'full_time',
                'salary_min' => 25000,
                'salary_max' => 35000,
                'salary_currency' => 'GBP',
                'salary_visible' => true,
                'vacancies' => 3,
                'description' => <<<'DESCRIPTION'
Launch your career in recruitment! We're looking for enthusiastic Recruitment Consultants 
to help connect talented professionals with exciting opportunities.

About the Role:
- Source, screen, and interview candidates
- Build and maintain talent pipelines for various roles
- Develop client relationships and understand hiring needs
- Manage the complete recruitment cycle from brief to placement
- Use our AI-powered recruitment platform to identify candidates
- Meet targets and KPIs for placements and client satisfaction
- Collaborate with team members to share best practices

Day-to-Day Responsibilities:
- Review applications and conduct telephone/video interviews
- Identify top candidates and present to clients
- Provide feedback and guidance to candidates
- Track pipeline metrics and forecast placements
- Attend industry events and networking opportunities
- Build long-term relationships with hiring managers
DESCRIPTION,
                'requirements' => <<<'REQUIREMENTS'
Essential Requirements:
- High school diploma or equivalent
- Strong communication and interpersonal skills
- Ability to multitask and manage time effectively
- Enthusiasm and motivation to succeed in recruitment
- Basic computer skills and ability to learn new systems

Desirable Experience:
- Previous recruitment or sales experience
- Knowledge of IT, finance, or engineering sectors
- Experience with ATS (Applicant Tracking Systems)
- Understanding of recruitment best practices
- Fluency in additional languages
REQUIREMENTS,
                'benefits' => <<<'BENEFITS'
We Offer:
- Starting salary: £25,000 - £35,000 per annum
- Performance-based commission structure
- Flexible hybrid working (3 days in office, 2 remote)
- Comprehensive training and mentoring program
- Career development and progression opportunities
- Generous annual leave (25 days + bank holidays)
- Employee benefits: healthcare, gym membership
- Employee Assistance Programme
- Team social events and outings
- Access to industry networking events
BENEFITS,
            ],
            [
                'title' => 'Product Manager - Talent Acquisition',
                'department' => 'Product & Strategy',
                'experience_level' => 'Mid-Level',
                'location' => 'Edinburgh, United Kingdom',
                'location_city' => 'Edinburgh',
                'location_region' => 'Edinburgh',
                'location_country_code' => 'GB',
                'location_label' => 'Edinburgh, UK',
                'location_latitude' => 55.9533,
                'location_longitude' => -3.1883,
                'location_type' => 'hybrid',
                'job_type' => 'full_time',
                'salary_min' => 55000,
                'salary_max' => 75000,
                'salary_currency' => 'GBP',
                'salary_visible' => true,
                'vacancies' => 1,
                'description' => <<<'DESCRIPTION'
Shape the future of recruitment technology as our Product Manager for Talent Acquisition. 
Lead the vision and strategy for our core recruitment platform.

About the Role:
- Own the product roadmap for talent acquisition features
- Conduct market research and gather customer feedback
- Define requirements and user stories for the engineering team
- Collaborate with sales, marketing, and support teams
- Analyze product metrics and drive data-informed decisions
- Identify market opportunities and competitive advantages
- Lead cross-functional initiatives and product launches

Key Responsibilities:
- Develop product strategy aligned with company goals
- Prioritize features based on customer impact and business value
- Conduct user interviews and usability testing
- Present product vision to stakeholders and customers
- Track KPIs and product health metrics
- Stay abreast of HR technology and recruitment trends
DESCRIPTION,
                'requirements' => <<<'REQUIREMENTS'
Essential Requirements:
- 3-5 years of product management experience
- Experience with SaaS or enterprise software products
- Strong analytical and problem-solving skills
- Excellent communication and presentation abilities
- Experience with recruitment, HR, or talent tech domain
- Proficiency with product management tools and analytics
- Understanding of agile development methodologies

Desirable Experience:
- Background in recruitment or HR services
- Experience with AI/ML product features
- Knowledge of recruitment compliance and regulations
- Proven track record of successful product launches
- Understanding of B2B sales and customer success
REQUIREMENTS,
                'benefits' => <<<'BENEFITS'
We Offer:
- Competitive salary: £55,000 - £75,000 per annum
- Hybrid working (flexible location)
- Comprehensive health insurance package
- Pension scheme (5% employer contribution)
- Annual leave: 28 days + bank holidays
- Professional development budget (£4,000/year)
- Product conference attendance
- Performance bonus (up to 15%)
- Flexible working hours
- Stock options eligibility
- Collaborative and innovative work environment
BENEFITS,
            ],
        ];

        foreach ($jobs as $jobData) {
            // Don't create duplicate jobs
            if (JobListing::where('title', $jobData['title'])->where('company_id', $company->id)->exists()) {
                $this->command->info("Job '{$jobData['title']}' already exists. Skipping...");
                continue;
            }

            $jobData['company_id'] = $company->id;
            $jobData['created_by'] = $creator->id;
            $jobData['status'] = 'active';
            $jobData['published_at'] = Carbon::now();
            $jobData['expires_at'] = Carbon::now()->addMonths(3);

            $job = JobListing::create($jobData);

            // Add relevant skills to each job
            $this->seedJobSkills($job);

            $this->command->info("✓ Created job: '{$job->title}'");
        }

        $this->command->info("\nSuccessfully created 5 job listings!");
    }

    private function seedJobSkills(JobListing $job): void
    {
        $skillsByDepartment = [
            'Senior Full Stack Developer' => [
                ['skill' => 'PHP', 'level' => 'required'],
                ['skill' => 'Laravel', 'level' => 'required'],
                ['skill' => 'JavaScript', 'level' => 'required'],
                ['skill' => 'React/Vue.js', 'level' => 'required'],
                ['skill' => 'Database Design', 'level' => 'required'],
                ['skill' => 'Docker', 'level' => 'preferred'],
                ['skill' => 'RESTful APIs', 'level' => 'required'],
            ],
            'Human Resources Manager' => [
                ['skill' => 'Recruitment', 'level' => 'required'],
                ['skill' => 'Employee Relations', 'level' => 'required'],
                ['skill' => 'Performance Management', 'level' => 'required'],
                ['skill' => 'HR Compliance', 'level' => 'required'],
                ['skill' => 'ATS Systems', 'level' => 'preferred'],
                ['skill' => 'CIPD Knowledge', 'level' => 'preferred'],
            ],
            'AI/ML Engineer - Recruitment Solutions' => [
                ['skill' => 'Python', 'level' => 'required'],
                ['skill' => 'Machine Learning', 'level' => 'required'],
                ['skill' => 'Deep Learning', 'level' => 'required'],
                ['skill' => 'Natural Language Processing', 'level' => 'required'],
                ['skill' => 'TensorFlow/PyTorch', 'level' => 'required'],
                ['skill' => 'Model Deployment', 'level' => 'required'],
                ['skill' => 'AWS/GCP', 'level' => 'preferred'],
            ],
            'Recruitment Consultant' => [
                ['skill' => 'Recruitment', 'level' => 'required'],
                ['skill' => 'Sales', 'level' => 'required'],
                ['skill' => 'Communication', 'level' => 'required'],
                ['skill' => 'Interview Skills', 'level' => 'required'],
                ['skill' => 'Candidate Screening', 'level' => 'preferred'],
                ['skill' => 'Relationship Building', 'level' => 'required'],
            ],
            'Product Manager - Talent Acquisition' => [
                ['skill' => 'Product Strategy', 'level' => 'required'],
                ['skill' => 'Data Analysis', 'level' => 'required'],
                ['skill' => 'User Research', 'level' => 'required'],
                ['skill' => 'Recruitment Domain', 'level' => 'required'],
                ['skill' => 'Agile Methodology', 'level' => 'required'],
                ['skill' => 'Cross-functional Leadership', 'level' => 'preferred'],
            ],
        ];

        $skills = $skillsByDepartment[$job->title] ?? [];

        foreach ($skills as $skill) {
            $job->skills()->create($skill);
        }
    }
}
