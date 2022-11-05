#include <iostream>
#include <string>
using namespace std;
// Keys Major and Minor class
class Chord
{
public:
    string CMajor = "C-D-E-F-G-A-B-C";
    string DMajor = "D-E-F#-G-A-B-C#-D";
    string EMajor = "E-F#-G#-A-B-C#-D#-E";
    string FMajor = "F-G-A-Bb-C-D-E-F";
    string GMajor = "G-A-B-C-D-E-F#-G";
    string AMajor = "A-B-C#-D-E-F#-G#-A";
    string BMajor = "B-C#-D#-E-F#-G#-A#-B";

    string Cminor = "C-D-Eb-F-G-Ab-Bb-C";
    string Dminor = "D-E-F-G-A-Bb-C-D";
    string Eminor = "E-F#-G#-A#-B#-C-D-E";
    string Fminor = "F-G-Ab-Bb-C-Db-Eb-F";
    string Gminor = "G-A-Bb-C-D-Eb-F-G";
    string Aminor = "A-B-C-D-E-F-G-A";
    string Bminor = "B-C#-D-E-F#-G-A-B";
    //Keys Major function doesn't return 
    void Major()
    {
        string userAnswer = "";
        char Array[] = { 'C', 'D', 'E', 'F', 'G', 'A', 'B' };// An Array takes a piano keys.
        cout << endl;
        cout << "         PLEASE USE A CAPITAL LETTER AND SHARP '#' OR FLAT 'b' SIGN TO BUILD MAJOR SCALE.\n" << endl;
        cout << "                                !!!!! Do NOT MIX '#' AND 'b'\n" << endl;
        cout << "                                  Use sign (-) between Keys.\n" << endl;
        cout << "Enter a Key: ";
        cin >> Array;
        cout << "Enter " << Array << " Key Major : ";
        getline(cin, userAnswer); // will store the user input in userAnswer
   // Now the checking part

        while (userAnswer != CMajor && userAnswer != DMajor && userAnswer != EMajor && userAnswer != FMajor && userAnswer != GMajor && userAnswer != AMajor && userAnswer != BMajor) //this while will run util user enter wrong answer
        {
            // cout << "PLEASE TRY AGAIN!";
             //cout << "\nPlease enter Major: ";
            getline(cin, userAnswer);
        }
        cout << endl;
        //as soon as user enter right answer while loop will be false and will come here
        cout << "CONGRATULATIONS! Your Answer is Verified." << endl;
    }
    // Keys Minor function doesn't return
    void Minor()
    {
        string userAnswer = "";
        char Array[] = { 'C', 'D', 'E', 'F', 'G', 'A', 'B' };
        cout << "Enter a Key: ";
        cin >> Array;
        cout << endl;
        cout << "PLEASE USE SHARP '#' OR FLAT 'b' SIGN TO BUILD MINOR SCALE.\n" << endl;
        cout << "                                !!!!! Do NOT MIX '#' AND 'b'\n" << endl;
        cout << "                                  Use sign (-) between Keys.\n" << endl;
        cout << "Enter " << Array << " Key minor : ";
        getline(cin, userAnswer); // will store the user input in userAnswer

       // Now the checking part

        while (userAnswer != Cminor && userAnswer != Dminor && userAnswer != Eminor && userAnswer != Fminor && userAnswer != Gminor && userAnswer != Aminor && userAnswer != Bminor) //this while will run util user enter wrong answer
        {
            //cout << "PLEASE TRY AGAIN!";
            //cout << "\nPlease enter minor: ";
            getline(cin, userAnswer);
        }
        cout << endl;
        //as soon as user enter right answer while loop will be false and will come here
        cout << "CONGRATULATIONS! Your Answer is Verified." << endl;
    }
};



       
