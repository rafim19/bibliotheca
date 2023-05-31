<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            Book::insert([
                [
                    'title' => "Harry Potter and The Sorcerer's Stone",
                    'author' => 'J.K Rowling',

                    'description' => 
                        '"Harry Potter and the Sorcerer\'s Stone" follows the story of Harry Potter, a young boy who discovers he is a wizard on his eleventh birthday. Living with his cruel relatives, Harry learns that his parents were killed by the dark wizard Lord Voldemort and that he is famous in the wizarding world for surviving Voldemort\'s attack as a baby.

                        "Harry Potter and the Sorcerer\'s Stone" is a captivating tale that introduces readers to the magical world created by J.K. Rowling. It combines elements of adventure, mystery, friendship, and the eternal battle between good and evil. The book sets the stage for Harry\'s journey as the Boy Who Lived and lays the foundation for the epic series that follows.',

                    'category_id' => 4,
                    'quantity' => 5,
                    'isbn' => '948-602-8329-23-9',
                    'publisher' => 'EBSCO',
                    'release_year' => '2020',
                    'edition' => 4,
                    'language' => 'English',
                    'borrowed_count' => 1,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Divergent',
                    'author' => 'Veronica Roth',
                    'description' => 'Divergent, the debut novel of American novelist Veronica Roth, was published by HarperCollins Children\'s Books in 2011. The novel is the first in the Divergent series, a trilogy of young adult dystopian novels (plus a book of short stories)[1] set in a post-apocalyptic version of Chicago. The society defines its citizens by their social and personality-related affiliation with one of five factions. This rigid system has removed the threat of anyone exercising independent will and re-threatening the population\'s safety. In the story, Beatrice Prior joins the ranks of the Dauntless and explores her new identity as "Tris". Underlying the action- and dystopian-focused main plot is a romantic subplot between Tris and "Four" (born Tobias Eaton), one of her instructors in the Dauntless faction.',
                    'category_id' => 4,
                    'quantity' => 1,
                    'isbn' => '948-602-8329-23-0',
                    'publisher' => 'EBSCO',
                    'release_year' => '2021',
                    'edition' => 3,
                    'language' => 'English',
                    'borrowed_count' => 1,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Nonparametric Statistics: Theory And Methods',
                    'author' => 'Isha Dewan',
                    'description' => 'The number of books on Nonparametric Methodology is quite small as compared to, say, on Design of Experiments, Regression Analysis, Multivariate Analysis, etc. Because of being perceived as less effective, nonparametric methods are still the second choice. Actually, it has been demonstrated time and again that they are useful. We feel that there is still need for proper texts/applications/reference books on Nonparametric Methodology.This book will introduce various types of data encountered in practice and suggest the appropriate nonparametric methods, discuss their properties through null and non-null distributions whenever possible and demonstrate the very minor loss in power and efficiency in the nonparametric method, if any.The book will cover almost all topics of current interest such as bootstrapping, ranked set sampling, techniques for censored data and Bayesian analysis under nonparametric set ups.',
                    'category_id' => 3,
                    'quantity' => 2,
                    'isbn' => '948-602-8329-23-5',
                    'publisher' => 'World Scientific Publishing Company',
                    'release_year' => '2017',
                    'edition' => 1,
                    'language' => 'English',
                    'borrowed_count' => 0,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Basic Mathematics for College Students',
                    'author' => 'Alan S. Tussy',
                    'description' => 'Basic Mathematics for College Students, 6th Edition, integrates the best of traditional drill and practice while taking a conceptual approach to Basic College Mathematics, showing students how to apply traditional mathematical skills in real-world contexts.
                    Important Notice: Media content referenced within the product description or the product text may not be available in the ebook version.
                    ',
                    'category_id' => 1,
                    'quantity' => 10,
                    'isbn' => '948-602-8329-23-1',
                    'publisher' => 'Cengage Learning',
                    'release_year' => '2018',
                    'edition' => 6,
                    'language' => 'English',
                    'borrowed_count' => 0,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Python Programming: An Introduction To Computer Science',
                    'author' => 'John M. Zelle',
                    'description' => 'This book is suitable for use in a university-level first course in computing (CS1), as well as the increasingly popular course known as CS0. It is difficult for many students to master basic concepts in computer science and programming. A large portion of the confusion can be blamed on the complexity of the tools and materials that are traditionally used to teach CS1 and CS2. This textbook was written with a single overarching goal: to present the core concepts of computer science as simply as possible without being simplistic.',
                    'category_id' => 2,
                    'quantity' => 3,
                    'isbn' => '948-602-8329-23-6',
                    'publisher' => 'Beedle',
                    'release_year' => '2004',
                    'edition' => 2,
                    'language' => 'English',
                    'borrowed_count' => 1,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Machine Learning An Algorithm Perspective',
                    'author' => 'Stephen Marsland',

                    'description' => 'Traditional books on machine learning can be divided into two groups — those aimed at advanced undergraduates or early postgraduates with reasonable mathematical knowledge and those that are primers on how to code algorithms. The field is ready for a text that not only demonstrates how to use the algorithms that make up machine learning methods, but also provides the background needed to understand how and why these algorithms work. Machine Learning: An Algorithmic Perspective is that text.

                    The book covers neural networks, graphical models, reinforcement learning, evolutionary algorithms, dimensionality reduction methods, and the important area of optimization. It treads the fine line between adequate academic rigor and overwhelming students with equations and mathematical concepts. The author addresses the topics in a practical way while providing complete information and references where other expositions can be found. He includes examples based on widely available datasets and practical and theoretical problems to test understanding and application of the material. The book describes algorithms with code examples backed up by a website that provides working implementations in Python. The author uses data from a variety of applications to demonstrate the methods and includes practical problems for students to solve.',
                    
                    'category_id' => 2,
                    'quantity' => 5,
                    'isbn' => '948-602-8329-23-2',
                    'publisher' => 'CRC Press',
                    'release_year' => '2011',
                    'edition' => 3,
                    'language' => 'English',
                    'borrowed_count' => 1,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Multivariate Data Analysis',
                    'author' => 'Joseph F. Hair',
                    'description' => 'For over 30 years, this text has provided students with the information they need to understand and apply multivariate data analysis. The eighth edition of Multivariate Data Analysis provides an updated perspective on the analysis of all types of data as well as introducing some new perspectives and techniques that are foundational in today’s world of analytics. Multivariate Data Analysis serves as the perfect companion for graduate and postgraduate students undertaking statistical analysis for business degrees, providing an application-oriented introduction to multivariate analysis for the non-statistician. By reducing heavy statistical research into fundamental concepts, the text explains to students how to understand and make use of the results of specific statistical techniques.',
                    'category_id' => 3,
                    'quantity' => 10,
                    'isbn' => '948-602-8329-23-7',
                    'publisher' => 'Cengage Learning',
                    'release_year' => '2022',
                    'edition' => 30,
                    'language' => 'English',
                    'borrowed_count' => 0,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'Probability and Stochastic Processes',
                    'author' => 'Roy D. Yates',
                    'description' => 'This text introduces engineering students to probability theory and stochastic processes. Along with thorough mathematical development of the subject, the book presents intuitive explanations of key points in order to give students the insights they need to apply math to practical engineering problems. The first seven chapters contain the core material that is essential to any introductory course. In one-semester undergraduate courses, instructors can select material from the remaining chapters to meet their individual goals. Graduate courses can cover all chapters in one semester.',
                    'category_id' => 3,
                    'quantity' => 10,
                    'isbn' => '948-602-8329-23-8',
                    'publisher' => 'Wiley',
                    'release_year' => '2014',
                    'edition' => 8,
                    'language' => 'English',
                    'borrowed_count' => 0,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'His Name Was Harry',
                    'author' => 'Harold K. Richter',
                    'description' => 'His Name Was Harry is a story of faith juxtaposed against the backdrop of spirituality. In this book, Harry Richards, a member of a large company s IT (Information Technology) department, loses his job but finds what s really important in life and relationships.',
                    'category_id' => 4,
                    'quantity' => 9,
                    'isbn' => '978-099-0571-96-4',
                    'publisher' => 'Capricorn Book Publishing',
                    'release_year' => '2015',
                    'edition' => 1,
                    'language' => 'English',
                    'borrowed_count' => 0,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'title' => 'A Boy Named Harry: The Childhood of Lee Kuan Yew',
                    'author' => 'Harold K. Richter',
                    'description' => 'The future leader of Singapore spent his growing up years doing what other children did in the 1920s. Harry liked to play with spinning tops, marbles, kites—and even fighting fish! While he was a little mischievous as a child, Harry worked hard in school to achieve academic success, eventually winning scholarships to attend the prestigious Raffles College.
                    Especially for younger readers, this inspiring picture book about the childhood of Harry Lee Kuan Yew is one that parents, caregivers and teachers can share with children, providing the perfect opportunity for grown-ups to tell share with them his contributions to the country.
                    ',
                    'category_id' => 4,
                    'quantity' => 10,
                    'isbn' => '978-099-0575-28-0',
                    'publisher' => 'Epigram Books',
                    'release_year' => '2014',
                    'edition' => 1,
                    'language' => 'English',
                    'borrowed_count' => 0,
                    'created_at' => Carbon::now()->toDateTimeString()
                ],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            
            $file = $th->getFile();
            $line = $th->getLine();
            $message = $th->getMessage();
            echo $message.". In File: ".$file.". In Line: ".$line;
        }
    }
}
