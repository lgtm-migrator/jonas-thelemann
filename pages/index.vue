<template>
  <div class="flex flex-col xl:flex-row">
    <img
      alt="Jonas in Venice."
      class="
        xl:fixed
        max-h-[85vh]
        xl:max-h-[100vh] xl:max-w-[50%]
        object-cover object-top
      "
      src="/assets/static/images/venice.jpg"
    />
    <img
      alt="Jonas in Venice."
      class="
        hidden
        xl:block
        invisible
        max-h-[85vh]
        xl:max-h-[100vh] xl:max-w-[50%]
        object-cover object-top
      "
      src="/assets/static/images/venice.jpg"
    />
    <div class="m-8 min-w-0 space-y-6">
      <div class="flex items-center justify-between">
        <!-- eslint-disable-next-line @intlify/vue-i18n/no-raw-text -->
        <h1 class="font-bold text-4xl">Jonas Thelemann</h1>
        <p class="font-normal text-2xl text-gray-500 text-right">
          {{ $t('metaInfo', { age: $moment().diff('1998-12-17', 'years') }) }}
        </p>
      </div>
      <div>
        <i18n path="descriptionShort">
          <template #ninjaneers>
            <!-- eslint-disable-next-line @intlify/vue-i18n/no-raw-text -->
            <a href="https://www.ninjaneers.de/">Ninjaneer</a>
          </template>
          <template #university>
            <a href="https://www.uni-kassel.de/">
              <span>{{ $t('universityKassel') }}</span>
            </a>
          </template>
        </i18n>
        <p class="text-gray-500">
          <a href="https://www.google.com/maps/place/Kassel">
            {{ $t('kasselAddress') }}
          </a>
        </p>
      </div>
      <div class="pb-2">
        <ul class="flex flex-wrap -mx-1.5">
          <!-- eslint-disable @intlify/vue-i18n/no-raw-text -->
          <li class="m-1.5">
            <Link to="https://giphy.com/channel/dargmuesli">Giphy</Link>
          </li>
          <li class="m-1.5">
            <Link to="https://github.com/dargmuesli">GitHub</Link>
          </li>
          <li class="m-1.5">
            <Link to="https://www.instagram.com/dargmuesli/">Instagram</Link>
          </li>
          <li class="m-1.5">
            <Link to="https://www.linkedin.com/in/jonas-thelemann-148a74205/">
              Linkedin
            </Link>
          </li>
          <li class="m-1.5">
            <Link to="https://www.mixcloud.com/creal/">Mixcloud</Link>
          </li>
          <li class="m-1.5">
            <Link
              to="https://open.spotify.com/user/1153065250?si=cf16bda05fd2491b"
            >
              Spotify
            </Link>
          </li>
          <li class="m-1.5">
            <Link to="https://stackoverflow.com/users/4682621/dargmuesli">
              Stack Overflow
            </Link>
          </li>
          <li class="m-1.5">
            <Link to="https://www.youtube.com/channel/UCmIrzQsJeEM5eW6KOAk9nSg">
              YouTube
            </Link>
          </li>
          <!-- eslint-enable @intlify/vue-i18n/no-raw-text -->
        </ul>
      </div>
      <div>
        <!-- Wrapping div required for paragraph's negative margin to work. -->
        <i18n class="mt-[-0.5rem]" path="about" tag="p">
          <template #aboutMarkSoftwareTemplate>
            <mark>{{ $t('aboutMarkSoftware') }}</mark>
          </template>
          <template #aboutMarkDjTemplate>
            <mark>{{ $t('aboutMarkDj') }}</mark>
          </template>
          <template #aboutAttraction>
            {{ $t('aboutAttraction') }}
          </template>
          <template #aboutSidefact>
            {{ $t('aboutSidefact') }}
          </template>
          <template #aboutCreating>
            {{ $t('aboutCreating') }}
          </template>
          <template #br>
            <br />
          </template>
        </i18n>
      </div>
      <div class="gap-6 grid grid-cols-1 md:grid-cols-2">
        <section>
          <h2 class="font-bold text-2xl">{{ $t('experience') }}</h2>
          <div class="mt-2">
            <p>{{ $t('softwareEngineer') }}</p>
            <p>
              <!-- eslint-disable @intlify/vue-i18n/no-raw-text -->
              <a href="https://www.ninjaneers.de/">Ninjaneers GmbH</a>
              <span class="text-gray-500">
                · {{ $t('monthShortJul') }} 2020 – {{ $t('present') }}
              </span>
              <!-- eslint-enable @intlify/vue-i18n/no-raw-text -->
            </p>
          </div>
        </section>
        <section>
          <h2 class="font-bold text-2xl">{{ $t('education') }}</h2>
          <div class="mt-2">
            <p>{{ $t('educationGoal') }}</p>
            <i18n path="educationContent">
              <template #place>
                <a href="https://www.uni-kassel.de/">
                  {{ $t('universityKassel') }}
                </a>
              </template>
              <template #time>
                <span class="text-gray-500">{{ $t('educationTime') }}</span>
              </template>
            </i18n>
          </div>
        </section>
        <section>
          <h2 class="font-bold text-2xl">{{ $t('organizations') }}</h2>
          <ul class="list-disc list-inside mt-2">
            <!-- eslint-disable @intlify/vue-i18n/no-raw-text -->
            <li>
              <a href="https://gi.de/">{{ $t('gi') }}</a>
              <span class="text-gray-500">
                · {{ $t('monthShortJan') }} 2019 – {{ $t('present') }}
              </span>
            </li>
            <li>
              <a href="https://www.ccc.de/">Chaos Computer Club</a>
              <span class="text-gray-500">
                · {{ $t('monthShortMay') }} 2018 – {{ $t('present') }}
              </span>
            </li>
            <li>
              <a href="https://flipdot.org/">flipdot Hackerspace Kassel</a>
              <span class="text-gray-500">
                · {{ $t('monthShortDec') }} 2016 – {{ $t('present') }}
              </span>
            </li>
            <!-- eslint-enable @intlify/vue-i18n/no-raw-text -->
          </ul>
        </section>
        <section>
          <h2 class="font-bold text-2xl">{{ $t('languages') }}</h2>
          <ul class="list-disc list-inside mt-2">
            <!-- eslint-disable @intlify/vue-i18n/no-raw-text -->
            <li>
              <span>{{ $t('german') }}</span>
              <span class="text-gray-500">
                · {{ $t('proficiencyNative') }}
              </span>
            </li>
            <li>
              <span>{{ $t('english') }}</span>
              <span class="text-gray-500">
                · {{ $t('proficiencyProfessional') }}
              </span>
            </li>
            <!-- eslint-enable @intlify/vue-i18n/no-raw-text -->
          </ul>
        </section>
        <section>
          <h2 class="font-bold text-2xl">{{ $t('honorsAwards') }}</h2>
          <ul class="list-disc list-inside mt-2">
            <li>
              <a
                href="https://www.uni-kassel.de/einrichtung/index.php?eID=dumpFile&t=f&f=1988&token=e881e12fc8112d90e46d21d4fbef05530929c5c0"
              >
                <span>{{ $t('honorsAwardsIdeasCompetition') }}</span>
              </a>
              <!-- eslint-disable-next-line prettier/prettier @intlify/vue-i18n/no-raw-text -->
              <span class="text-gray-500"> · <a href="https://www.uni-kassel.de/einrichtung/ukt/unikat-von-der-idee-zur-gruendung/unikat-ideenwettbewerb">UNI­KAT</a>, {{ $t('monthShortOct') }} 2020</span>
            </li>
            <li>
              <span>{{ $t('nominationScholarship') }}</span>
              <!-- eslint-disable-next-line prettier/prettier @intlify/vue-i18n/no-raw-text -->
              <span class="text-gray-500"> · <a href="https://www.studienstiftung.de/">{{ $t('studyFoundation') }}</a>, {{ $t('monthShortJul') }} 2019</span>
            </li>
          </ul>
        </section>
        <div class="flex flex-col items-center justify-center">
          <Link to="https://www.linkedin.com/in/jonas-thelemann-148a74205/">
            {{ $t('portfolioFull') }}
          </Link>
        </div>
        <hr class="md:col-span-2" />
        <section class="md:col-span-2">
          <h2 class="font-bold text-2xl">{{ $t('projects') }}</h2>
          <ul class="flex flex-wrap items-center justify-around mt-2">
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <a href="https://maev.si/">
                <img
                  alt="maevsi's logo"
                  class="h-12"
                  src="/assets/static/logos/maevsi.svg"
                />
              </a>
            </li>
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <a href="https://nearbuy-food.de/">
                <img
                  alt="nearbuy's logo"
                  class="h-12"
                  src="/assets/static/logos/nearbuy.svg"
                />
              </a>
            </li>
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <a href="https://creal.jonas-thelemann.de/">
                <p class="h-12 text-center text-gray-500">
                  <img
                    alt="cReal's logo"
                    class="h-12"
                    src="/assets/static/logos/creal.svg"
                  />
                </p>
              </a>
            </li>
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <a href="https://trapparty.jonas-thelemann.de/">
                <img
                  alt="TrapParty's logo"
                  class="h-12"
                  src="/assets/static/logos/trapparty.svg"
                />
              </a>
            </li>
            <li class="flex justify-center my-4 w-1/2 md:w-auto">
              <Link to="https://github.com/dargmuesli?tab=repositories">
                {{ $t('projectsMore', { repoCount }) }}
              </Link>
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
    const res = await $http.get(
      'https://api.github.com/users/dargmuesli/repos?per_page=1'
    )
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
  },
})
</script>

<style scoped>
mark {
  background-color: rgba(255, 255, 0, 0.5);
}
</style>

<i18n lang="yml">
de:
  about: '{aboutMarkSoftwareTemplate} irgendwo zwischen Frontend, Backend und DevOps.{br}{aboutMarkDjTemplate}, manchmal am Doubletime rappen.{br}{aboutAttraction}{br}{aboutSidefact}{br}{aboutCreating}'
  aboutAttraction: Angezogen von Dingen, die er nicht versteht. Gelangweilt, wenn Videos langsamer als mit 2x-Geschwindigkeit abspielen.
  aboutCreating: Ist verliebt darin, Dinge zu erschaffen.
  aboutMarkDj: DJ und Event-Organisator
  aboutMarkSoftware: Leidenschaftlicher Software-Entwickler
  aboutSidefact: Freundet sich gerade mit der Mitte von Schwarz und Weiß an, hodlt nebenbei.
  descriptionShort: '{ninjaneers}, studiert an der {university}.'
  education: Bildung
  educationContent: '{place} · {time}'
  educationGoal: Master der Software-Entwicklung
  educationTime: 2021 – 2023
  english: Englisch
  experience: Erfahrung
  german: Deutsch
  gi: Gesellschaft für Informatik
  honorsAwards: Ehrungen und Auszeichnungen
  honorsAwardsIdeasCompetition: Ideenwettbewerb Top 10 Projekt
  kasselAddress: Kassel, Hessen, Deutschland
  languages: Sprachen
  metaInfo: '{age}, er/ihn'
  monthShortDec: Dez
  monthShortJan: Jan
  monthShortJul: Jul
  monthShortMay: Mai
  monthShortOct: Okt
  nominationScholarship: Nominierung für ein Stipendium
  organizations: Organisationen
  portfolioFull: Zum ganzen Portfolio
  present: heute
  proficiencyNative: muttersprachliches Niveau
  proficiencyProfessional: professionelles Arbeitsniveau
  projects: Projekte
  projectsMore: und {repoCount} weitere…
  softwareEngineer: Software-Entwickler
  studyFoundation: Studienstiftung des deutschen Volkes
  universityKassel: Universität Kassel
en:
  about: '{aboutMarkSoftwareTemplate} somewhere between frontend, backend and devops.{br}{aboutMarkDjTemplate}, occasionally rapping double times.{br}{aboutAttraction}{br}{aboutSidefact}{br}{aboutCreating}'
  aboutAttraction: Attracted to things he doesn't understand. Bored when videos play at speeds of less than 2x.
  aboutCreating: Loves to create.
  aboutMarkDj: DJ and event organizer
  aboutMarkSoftware: Passionate software developer
  aboutSidefact: Currently getting used to the middle of black and white, hodling in the meantime.
  descriptionShort: '{ninjaneers}, studying at {university}.'
  education: Education
  educationContent: '{place} · {time}'
  educationGoal: Master's degree Software Engineering
  educationTime: 2021 – 2023
  english: English
  experience: Experience
  german: German
  gi: Society for Computer Science
  honorsAwards: Honors & Awards
  honorsAwardsIdeasCompetition: Ideas Competition Top 10 Project
  kasselAddress: Kassel, Hesse, Germany
  languages: Languages
  metaInfo: '{age}, he/him'
  monthShortDec: Dec
  monthShortJan: Jan
  monthShortJul: Jul
  monthShortMay: May
  monthShortOct: Oct
  nominationScholarship: Nomination for a scholarship
  organizations: Organizations
  portfolioFull: View full portfolio
  present: today
  proficiencyNative: native proficiency
  proficiencyProfessional: professional working proficiency
  projects: Projects
  projectsMore: and {repoCount} others…
  softwareEngineer: Software Engineer
  studyFoundation: Study Foundation of the German People
  universityKassel: University of Kassel
</i18n>
