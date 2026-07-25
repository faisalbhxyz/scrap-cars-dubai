export type Service = {
  id: string;
  slug: string;
  image: string;
  titleKey: string;
  descKey: string;
};

export const services: Service[] = [
  {
    id: "accidental",
    slug: "accidental-cars-dubai",
    image: "accidental",
    titleKey: "svc_accidental",
    descKey: "svc_accidental_desc",
  },
  {
    id: "mulkiya-finish",
    slug: "accident-mulkiya-finish-cars-dubai",
    image: "mulkiya-finish",
    titleKey: "svc_mulkiya_finish",
    descKey: "svc_mulkiya_finish_desc",
  },
  {
    id: "damaged",
    slug: "damaged-cars-dubai",
    image: "damaged",
    titleKey: "svc_damaged",
    descKey: "svc_damaged_desc",
  },
  {
    id: "impounded",
    slug: "impounded-cars-dubai",
    image: "impounded",
    titleKey: "svc_impounded",
    descKey: "svc_impounded_desc",
  },
  {
    id: "nonrunning",
    slug: "non-running-cars-dubai",
    image: "nonrunning",
    titleKey: "svc_nonrunning",
    descKey: "svc_nonrunning_desc",
  },
  {
    id: "mechanical",
    slug: "mechanical-issues-cars-dubai",
    image: "mechanical",
    titleKey: "svc_mechanical",
    descKey: "svc_mechanical_desc",
  },
  {
    id: "electrical",
    slug: "electrical-issues-cars-dubai",
    image: "electrical",
    titleKey: "svc_electrical",
    descKey: "svc_electrical_desc",
  },
  {
    id: "old",
    slug: "old-cars-dubai",
    image: "old",
    titleKey: "svc_old",
    descKey: "svc_old_desc",
  },
  {
    id: "flooded",
    slug: "flooded-cars-dubai",
    image: "flooded",
    titleKey: "svc_flooded",
    descKey: "svc_flooded_desc",
  },
];

export function getServiceBySlug(slug: string): Service | undefined {
  return services.find((s) => s.slug === slug);
}

export function serviceKeyId(id: string) {
  return id.replace(/-/g, "_");
}
