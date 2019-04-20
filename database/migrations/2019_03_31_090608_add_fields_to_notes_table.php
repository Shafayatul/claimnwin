<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AddFieldsToNotesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::table('notes', function (Blueprint $table) {

            $table->string('user_id')->nullable();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::table('notes', function (Blueprint $table) {

            $table->dropColumn('user_id');

            $table->dropColumn('note_status');

            $table->dropColumn('airline_ref');

        });

    }

}

