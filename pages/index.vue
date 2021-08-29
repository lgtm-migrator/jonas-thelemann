<template>
  <div class="flex flex-col xl:flex-row">
    <img alt="Jonas in Venice." class="xl:fixed max-h-[85vh] xl:max-h-[100vh] xl:max-w-[50%] object-cover object-top" src="/assets/static/images/venice.jpg" />
    <img alt="Jonas in Venice." class="hidden xl:block invisible max-h-[85vh] xl:max-h-[100vh] xl:max-w-[50%] object-cover object-top" src="/assets/static/images/venice.jpg" />
    <div class="m-8 min-w-0 space-y-6">
      <div class="flex items-center justify-between">
        <h1 class="font-bold text-4xl">
          Jonas Thelemann
        </h1>
        <p class="font-normal text-2xl text-gray-500 text-right">
          {{ $moment().diff('1998-12-17', 'years')}}, he/him
        </p>
      </div>
      <div>
        <p>
          <a href="https://www.ninjaneers.de/">Ninjaneer</a>, studying at <a href="https://www.uni-kassel.de/">University of Kassel</a>.
        </p>
        <p class="text-gray-500">
          <a href="https://www.google.com/maps/place/Kassel">Kassel, Hesse, Germany</a>
        </p>
      </div>
      <div class="pb-2">
        <ul class="flex flex-wrap -mx-1.5">
          <li class="m-1.5"><Link to="https://giphy.com/channel/dargmuesli">Giphy</Link></li>
          <li class="m-1.5"><Link to="https://github.com/dargmuesli">GitHub</Link></li>
          <li class="m-1.5"><Link to="https://www.instagram.com/dargmuesli/">Instagram</Link></li>
          <li class="m-1.5"><Link to="https://www.linkedin.com/in/jonas-thelemann-148a74205/">Linkedin</Link></li>
          <li class="m-1.5"><Link to="https://www.mixcloud.com/creal/">Mixcloud</Link></li>
          <li class="m-1.5"><Link to="https://open.spotify.com/user/1153065250?si=cf16bda05fd2491b">Spotify</Link></li>
          <li class="m-1.5"><Link to="https://stackoverflow.com/users/4682621/dargmuesli">Stack Overflow</Link></li>
          <li class="m-1.5"><Link to="https://www.youtube.com/channel/UCmIrzQsJeEM5eW6KOAk9nSg">YouTube</Link></li>
        </ul>
      </div>
      <div><!-- Wrapping div required for paragraph's negative margin to work. -->
        <p class="mt-[-0.5rem]">
          <mark>Passionate software developer</mark> somewhere between frontend, backend and devops.
          <br />
          <mark>DJ and event organizer</mark>, occasionally rapping double times.
          <br />
          Attracted to things he doesn't understand. Bored, when videos play at speeds of less than 2x.
          <br />
          Currently getting used to the middle of black and white. Hodling in the meantime.
          <br />
          Loves to create.
        </p>
      </div>
      <div class="gap-6 grid grid-cols-1 md:grid-cols-2">
        <section>
          <h2 class="font-bold text-2xl">
            Experience
          </h2>
          <div class="mt-2">
            <p>
              Software Engineer
            </p>
            <p>
              <a href="https://www.ninjaneers.de/">Ninjaneers GmbH</a><span class="text-gray-500"> · Jul 2020 – Present</span>
            </p>
          </div>
        </section>
        <section>
          <h2 class="font-bold text-2xl">
            Education
          </h2>
          <div class="mt-2">
            <p>
              Bachelor's degree Software Engineering
            </p>
            <p>
              <a href="https://www.uni-kassel.de/">University of Kassel</a><span class="text-gray-500"> · 2017 – 2021</span>
            </p>
          </div>
        </section>
        <section>
          <h2 class="font-bold text-2xl">
            Organizations
          </h2>
          <ul class="list-disc list-inside mt-2">
            <li>
              <a href="https://gi.de/">
                Gesellschaft für Informatik
              </a>
              <span class="text-gray-500"> · Jan 2019 – Present</span>
            </li>
            <li>
              <a href="https://www.ccc.de/">
                Chaos Computer Club
              </a>
              <span class="text-gray-500"> · May 2018 – Present</span>
            </li>
            <li>
              <a href="https://flipdot.org/">
                flipdot Hackerspace Kassel
              </a>
              <span class="text-gray-500"> · Dec 2016 – Present</span>
            </li>
          </ul>
        </section>
        <section>
          <h2 class="font-bold text-2xl">
            Languages
          </h2>
          <ul class="list-disc list-inside mt-2">
            <li>
              German<span class="text-gray-500"> · native proficiency</span>
            </li>
            <li>
              English<span class="text-gray-500"> · professional working proficiency</span>
            </li>
          </ul>
        </section>
        <section>
          <h2 class="font-bold text-2xl">
            Honors & Awards
          </h2>
          <ul class="list-disc list-inside mt-2">
            <li>
              <a href="https://www.uni-kassel.de/einrichtung/index.php?eID=dumpFile&t=f&f=1988&token=e881e12fc8112d90e46d21d4fbef05530929c5c0">
                Ideas Competition Top 10 Project
              </a>
              <span class="text-gray-500"> · <a href="https://www.uni-kassel.de/einrichtung/ukt/unikat-von-der-idee-zur-gruendung/unikat-ideenwettbewerb">UNI­KAT</a>, Oct 2020</span>
            </li>
            <li>
              Nomination for a scholarship<span class="text-gray-500"> · <a href="https://www.studienstiftung.de/">Studienstiftung des deutschen Volkes</a>, Jul 2019</span></li>
          </ul>
        </section>
        <div class="flex flex-col items-center justify-center">
          <Link to="https://www.linkedin.com/in/jonas-thelemann-148a74205/">View full portfolio</Link>
        </div>
        <hr class="md:col-span-2" />
        <section class="md:col-span-2">
          <h2 class="font-bold text-2xl">
            Projects
          </h2>
          <ul class="flex flex-wrap items-center justify-around mt-2">
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <a href="https://maev.si/">
                <img alt="maevsi's logo" class="h-12" src="/assets/static/logos/maevsi.svg">
              </a>
            </li>
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <a href="https://nearbuy-food.de/">
                <img alt="nearbuy's logo" class="h-12" src="/assets/static/logos/nearbuy.svg">
              </a>
            </li>
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <a href="https://github.com/thelinmichael/spotify-web-api-java">
                <p class="h-12 text-center">
                  <span class="text-gray-500">thelinmichael/</span>
                  <br />
                  spotify-web-api-java
                </p>
              </a>
            </li>
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <Link to="https://github.com/dargmuesli?tab=repositories">and {{repoCount}} others…</Link>
            </li>
          </ul>
        </section>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from '@vue/composition-api'
import { Context } from '@nuxt/types'

export default defineComponent({
  async asyncData({ $http }: Context) {
    const res = await $http.get('https://api.github.com/users/dargmuesli/repos?per_page=1')
    const headerLink = res.headers.get('link')
    const repoCount: string | null = headerLink
      ? new URLSearchParams(
        new URL(
          headerLink
          .split(', ')[1]
          .split('; ')[0]
          .replace(/(^<|>$)/g, '')
        ).searchParams
      ).get('page')
      : null

    return { repoCount }
  }
})
</script>
